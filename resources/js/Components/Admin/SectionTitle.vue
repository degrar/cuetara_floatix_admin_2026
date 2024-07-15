<template>
    <div class="md:col-span-1 flex justify-between md:my-4 pt-8">
        <div class="px-4 sm:px-0">
            <h1 class="text-4xl font-medium text-gray-900 font-poppins text-police">
                <slot name="title" />
            </h1>

            <p class="mt-1 text-sm text-gray-600 font-poppins text-police">
                <slot name="description" />
            </p>
        </div>

        <div class="px-4 sm:px-0 font-poppins text-police">
            <slot name="aside" />
        </div>
    </div>
</template>
