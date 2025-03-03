<script setup>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import { Head, Link } from '@inertiajs/vue3';
import ApplicationMark from '@/Components/Admin/ApplicationMark.vue';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/Admin/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
    title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
    Inertia.post(route('logout'));
};
</script>

<template>
    <div>
        <Head :title="title">
            <link
                rel="stylesheet"
                href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
            />

            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
        </Head>

        <div class="flex font-montserrat">
            <div class="md:w-[20%] bg-snow border-r border-gray-100 md:h-[100vh] overflow-hidden scrollbar hover:overflow-y-auto pt-8 sticky top-0 sidebar">
                <nav>
                    <!-- Primary Navigation Menu -->
                    <div class="container mx-auto px-2">
                        <div class="flex justify-center items-center h-16">
                            <Link :href="route('admin.dashboard')">
                                <ApplicationMark class="block h-9 w-auto" />
                            </Link>
                        </div>
                    </div>

                    <!-- Responsive Navigation Menu -->
                    <div :class="{'block': showingNavigationDropdown, 'hidden': ! showingNavigationDropdown}" class="sm:hidden">
                        <!-- Responsive Settings Options -->
                        <div class="pt-4 pb-1 border-t border-gray-200">
                            <div class="flex items-center px-4">
                                <div>
                                    <div class="font-medium text-base text-gray-800">
                                        {{ $page.props.auth.user.name }}
                                    </div>
                                    <div class="font-medium text-sm text-gray-500">
                                        {{ $page.props.auth.user.email }}
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 space-y-1">
                                <ResponsiveNavLink :href="route('profile.show')" :active="route().current('profile.show')">
                                    Profile
                                </ResponsiveNavLink>

                                <!-- Authentication -->
                                <form method="POST" @submit.prevent="logout">
                                    <ResponsiveNavLink as="button">
                                        Log Out
                                    </ResponsiveNavLink>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="h-full px-2 py-4 mt-[4em]">
                        <ul class="space-y-6">
                            <li>
                                <NavLink :href="route('admin.dashboard')" :active="route().current('admin.dashboard')">
                                    <img class="h-[24px]" src="data:image/png;base64,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">
                                    <span class="ml-3">
                                        Dashboard
                                    </span>
                                </NavLink>
                            </li>
                            <li>
                                <NavLink :href="route('admin.users')" :active="route().current('admin.users')">
                                    <img class="h-[24px]" src="data:image/png;base64,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">
                                    <span class="ml-3">
                                        Usuarios
                                    </span>
                                </NavLink>
                            </li>
                            <li>
                                <NavLink>
                                    <img class="h-[24px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADyElEQVR4nO1ZzWsTQRRf8FBQUdvLzCZpgjV3sUg9VHeTtEJt9aBQL/4DOdgq9CDWHqTaglfFQ22NbdmZlRw99KIXL5p+IFa6KyqC6J9g1YYqKy/Nbjab/czuxkXy4LFkZnbn95t5M+8jDNOW/1DS6aEOxHLjmOVKmOW2q1qCNuhjoiyx2JluzPLvMMsrpor5TRjDRFHS6aEOAGgJXkcikjuBKmazBxJhbgex/NVUij+STJ7uRCw/Bm1aP8uNM1ETzPKrNYD8mLEf2mo7wZWYqAlmue8qQFh1tX357fIBIomzj0qFL2p/PJktr3xcaZ0ZoRh3AbHcOsJ8uQriD8ZcoZ5Azc7VtuJW8aAgietEFhVQx/PBgvnxZZgLY244GPAoM2I1WWfn4GFtXJUcPNU2Iot3VPCg8e6cKxJYJYMyI/4JsNyGyccbdwBzswhzv+CpEZDEz3oCVyauK/FE1guJVf8EamajdHX1HfLyriDR33oCjUp/GN+BXdXfZr4JmNm2W7EHL1Y06DldfYxIZJhI4jc3AJtRrJsT5hEk8VzABMIDT4wEZFERZPo1WAIhgicmBKxMrU2ARHEH0g3xfLgmtLQpKPmZSeVUblRJHh1o8AWeCNjF8wYPGwj4hy/nld7+S5aODDy3awL28Ty3W+dhA1r5XjvwiWzFc7smYBXPm40NgkB+ZlIDm0jmlPzsLeXx+pLleN/xfNAE+rKjGgEA7zS+6Xge4nYiidcEWXwjSPRnUPaf6hnUCCysLer7tgWJTpEPpKeoFPc5ArcjUAEv0xdB3joOBLbpe3rSNWgnExJkejcM8FYmJMj0JtOsmBzisflSoS6eD1LzJof4xv3p400TsLtGjVdaK65RbLi63TsyKxI6p9IqR4Z0zrOZUOJ1vDtbNnProYQSA5eVWCJTN5/vhGZu49n+sAkQnQoS3SHS08HQMjLnHDcYEjgsAmpb2CSwya63CeD2Doj/xoSQrrCllhLDtP+FtaU6D+2fABRaDXez2yTEqNCXSOXqxsy9Kign+i+afg/iJf8EEH/eLQEnj60Wd/VjJh5MW35r6sk9/wT2SGRGEMuv6c3JTr3Y9pxhB4AcrLwevG8CRjGrzNkkKFXbXtT6U8fOejoXvipzZgK1SviolxQR2tR+KKEQD+DpFh1iwhazfAJWHRTAw42iEZyZDMc0WvE3K4TPEIGSvdXdZaIkdvmECh5ygJqJ0E9M1ESfT8QSmR0oF0KsD2ajrrymknibibJUqxrPzQ+nWIJ8419jdBQgIUh0GswF/hODJ/wOAvxffxV/94C4Yr4AAAAASUVORK5CYII=">
                                    <span class="ml-3">
                                        Participaciones
                                    </span>
                                </NavLink>

                                <ul class="space-y-1 pl-4 my-2">
                                    <li>
                                        <NavLink class="!text-sm" :href="route('admin.games.home')" :active="route().current('admin.games.home')">
                                            Todas
                                        </NavLink>
                                    </li>
                                </ul>
                                <li>
                                    <hr class="md:w-[50%] mx-auto bg-gray-200">
                                </li>
                                <ul class="space-y-1 pl-4 mt-2">
<!--                                    <li>-->
<!--                                        <NavLink class="!text-sm" :href="route('admin.games.pending')" :active="route().current('admin.games.pending')">-->
<!--                                            Validar Ticket-->
<!--                                        </NavLink>-->
<!--                                    </li>-->
                                    <li>
                                        <NavLink class="!text-sm" :href="route('admin.games.requested')" :active="route().current('admin.games.requested')">
                                            Pendiente Usuario
                                        </NavLink>
                                    </li>
                                    <li>
                                        <NavLink class="!text-sm" :href="route('admin.games.awaiting')" :active="route().current('admin.games.awaiting')">
                                            Validar Participación
                                        </NavLink>
                                    </li>
                                    <li>
                                        <NavLink class="!text-sm" :href="route('admin.games.winners')" :active="route().current('admin.games.winners')">
                                            Ganadores
                                        </NavLink>
                                    </li>
                                    <li>
                                        <NavLink class="!text-sm" :href="route('admin.games.denied')" :active="route().current('admin.games.denied')">
                                            Rechazados
                                        </NavLink>
                                    </li>

                                </ul>
                            </li>
<!--                            <li>-->
<!--                                <NavLink :href="route('admin.messages')" :active="route().current('admin.messages')">-->
<!--                                    <img class="h-[24px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADzklEQVR4nO1YW0gVQRjeEgp66CV1/lm1iE5Uxy7Ug3Rzfo9dNOkOJhVFPVhQREQEBYJFUSHpbiRFiVl0twtFVEREBKHtVvTQ5cGHIsgoipDwsgvpxG7nnHbXczx62nPU2g/mZXZm9vvm//7ZnV8QPHjw8P+BULafAOpAkbvT2E+g+AkoKoTigbSMwLSECgCKP9wjjxEbAbyRmsHGJ0QAobiPANMSLQIoawFgRcLAR3FKamouTRfZUqB4BSh22uwFbJEwmEBIbg4B/GCNRFpaYFw8C+UDxfpggpm7QgC/U5q70DmW0ty1QFlrXAkM2Gy8hxAWCK03Kmu2aBVBKF7vNXG/3z8MgJ2O+lJgl7qJpfjYFd8D1hrvN9ZMT8eZQLEr+Kyr16cTUFbXw+ngcgQw0gbV/OFiOiAYBba/t7b5Q5jiGUpxoiAIQ4XEYCgAm0QoO2cXkYe/NwaXW+zWGHM1u2I8KyQRBPC8xUqXQ7lg6WuOuUgwYc0JohiYkAziIRiR6E62OMWa8EIsBD/r5gRjsvO5rOhrJFVrlFWtXVZ17maretoRthAVsbOcc9O2Vmv1QkD0wbKqHXebtOxo1vfLin61vp6nuCLA2PlEk5edAoy+Z9oOdwSoWkN/CJBU/Z0rAiRFa+uXCKj2vr+IQOLJy54AwYsA9yxEvSRG7xSSvWMU/60PGRXzgnUo1hL373QyyFdZfqfFjEC4f3LO+s1A2SMALO7ThSZ4lUyagLLrTWEBvuyV4f5jL9rEmMSjXKLPJVPAvJJ9YQGB4vL4BBi1GUcV4jzAXL8R3kTZpuxaE89ftdfm/511z+ITYEYBsDZayUPMzOcrtp3okVTF4xZesO4wzxy9oNvYgw++8CmzNvRYVincUGGbc/QpH9knAcHCVk1UEVnzo5LfffEV989YEx6bNbbA9rz0yL2Y5Csb2qxz3vaJvD0SeWgUWwmwj8YlO9IRF2qSovHVey6Y4qzjlm2t7jECYkbATFjD81bbWNrGuAV0ExRFgEFqzpJdNuJjxhXx0oq7f5UfkqqdcI28U0Doirn9VCP3Za+wkZ/ONvHyW+/jI61obbKiPZFUvcRV8k4BPl/hcAA8bK3lUzGPLy6VeFVDayRiauWLDp/rpPoC+/HKXtoEZa/kO2rVSMS7ZFU/Wv6amxXnfgUBbI90crDlu/mhh18jeFj/LCkdBcJAAVB22/GRawdgWyInoH6/WmkFYSCBkFnphOIdAuwbALtJCE42+h0nR4esats550OEwQLpt8+NXX8jN+pThcEGWdElo518zkf0NxdhsOEXmjkw3EriwiMAAAAASUVORK5CYII=">-->
<!--                                    <span class="ml-3">-->
<!--                                        Mensajes-->
<!--                                    </span>-->
<!--                                </NavLink>-->
<!--                            </li>-->
                            <li>
                                <hr class="md:w-[50%] mx-auto bg-gray-200">
                            </li>
                            <template v-if="$page.props.perms?.admin">
                                <li>
                                    <NavLink :href="route('admin.settings.home')" :active="route().current('admin.settings.home')">
                                        <img class="h-[24px]" src="data:image/png;base64,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">
                                        <span class="ml-3">
                                        Configuración
                                    </span>
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :href="route('admin.health')" :active="route().current('health')">
                                        <span class="ml-3">
                                            Health
                                        </span>
                                    </NavLink>
                                </li>
                                <li>
                                    <NavLink :href="route('admin.logs')" :active="route().current('admin.logs')">
                                        <span class="ml-3">
                                            Logs
                                        </span>
                                    </NavLink>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <!-- Hamburger -->
                    <div class="-mr-2 flex items-center sm:hidden absolute right-0 bottom-0 md:relative">
                        <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </nav>


            </div>

            <div class="md:w-[80%] basis-min-h-screen bg-gray-100 md:px-8 page-content">
                <!-- Page Heading -->
                <header v-if="$slots.header" class="bg-white">
                    <div class="container mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <slot name="header" />
                    </div>
                </header>
                <!-- Page Content -->
                <main>
                    <!-- SM:menu -->
                    <div class="hidden sm:flex sm:items-center sm:ml-6 absolute md:right-8 md:top-4">
                        <!-- Settings Dropdown -->
                        <div class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <span class="inline-flex rounded-md">
<!--                                           <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name">-->

                                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                                                {{ $page.props.auth.user.name }}

                                                <svg
                                                    class="ml-2 -mr-0.5 h-4 w-4"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20"
                                                    fill="currentColor"
                                                >
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </span>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        Manage Account
                                    </div>

<!--                                    <DropdownLink :href="route('profile.show')">-->
<!--                                        Profile-->
<!--                                    </DropdownLink>-->

                                    <div class="border-t border-gray-100" />

                                    <!-- Authentication -->
                                    <form @submit.prevent="logout">
                                        <DropdownLink as="button">
                                            Log Out
                                        </DropdownLink>
                                    </form>
                                </template>
                            </Dropdown>
                        </div>
                    </div>

                    <Banner />

                    <slot />
                </main>
            </div>
        </div>
    </div>
</template>
