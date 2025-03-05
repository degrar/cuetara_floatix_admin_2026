<template>
    <div v-if="isLoading" class="fixed bg-black opacity-50 h-screen top-0 left-0 w-full h-full flex justify-center items-center z-50">
        <div class="inline-block h-8 w-8 animate-spin rounded-full border-4 border-solid border-current border-e-transparent align-[-0.125em] text-surface motion-reduce:animate-[spin_1.5s_linear_infinite] dark:text-white" role="status">
            <span class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]" >Loading...</span>
        </div>
    </div>
    <div>
        <div class="rem:text-[14px] game-item grid grid-cols-8 py-4 px-4 border-b divide-gray-200 divide-x last:border-none group relative bg-white/50 hover:bg-gray-100 overflow-x-hidden" :class="{ '!grid-cols-9': !hideActions, '!bg-green-200': data.state === 3 , '!bg-rose-200': data.state === 7 }" v-bind="$attrs">
            <div class="field scrollbar overflow-x-auto px-2 ">
                <span class="text-left">
                    <template v-if="route().current('admin.games.pending')">
                        {{ data.id }}
                    </template>
                    <template v-else>
                        {{ data.id }}
                    </template>
                </span>
            </div>

            <div class="field scrollbar overflow-x-auto col-span-2 px-2 !items-start !justify-start w-full">

                <div class="break-word">
                    <span class="font-semibold">ID:</span> {{ data.user.id }} <br>
                    <span class="font-semibold">Nombre:</span> {{ data.user.name }} {{ data.user.surname }} <br>
                    <span class="font-semibold">Email:</span> <span class="break-all">{{ data.user.email }} </span><br>
<!--                    <span class="font-semibold">Teléfono: </span>{{ data.user.phone }}-->
                </div>


            </div>

            <div class="field scrollbar overflow-x-auto px-2">
                <span v-if="data.files && data.files.length > 0" class="w-[28px] cursor-pointer" @click="$emit('dialog', data.files)">
                    <img title="Archivos" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEkElEQVR4nO1Z628UVRTfpH+ClnvvbqFL20UrD9s0qYDsTIfdEmgjlEcLBSpBq/WDpjaVgK1LIS0Ild1ttbQGDKAEGx6pu2KU+PjANzV+ML5iTDSLBtF+kNIdMSQkx5yRmd7dzi4zOzu7jdmTnNzMff5+55577tm7DkdBClKQgsxpYUx8kDBhlFDhN8qEu5SJYK8KdwkVfyVMfJNSqdQSeEIEiTLhD/tBi6l0mhDv6owtn2fwgEqYOEnIinnmrc+EMW0SKl7D3XA4mosctktzEaVegTAhxpE4bnoa9ENtAgV8bmWes843Q0CImZ6AP7C5sXyyNBfxB9thVng/TG67NXTZEw9FPoyHIn/L4SjYpZTDMBWMVmSFAIKXQ9G4EQBTwfcg1PoK+KuboWyBXynxG+uNjHfP9ynrYymHo9NTwxPllgnEw9EPjILf8NgO3ciyvnaHIRIjO/tg+SNNSonfuLZ1AgbdJritN214xJ2QTbpUPByRLRMwuhi6izp+cGsPTB69BIMtPVpdfXVLRuciZwTKS+u18X8evajUYanWYbt8nzm+73sbhrcHlDLnBNDC2g60ZLYDtZUblL5Y5pwA+rjVM0C5/jkngFEGo40eeIxORqIQtUKAUPHOvTzoDl8/OXgJRtsOwG7pGfBVtcDT0rNwavcATIciuiTQ0uguZaV+pQxvCxi+B6ilHaDCYUKFf7BU64qLpfIVi5t0rbq2Ziv8sP+djCKLbAeBZHE6Vy3670dNar9e5mmAr3tPzT0CjIkPUyb+rk62cIEfTuzqhy9fPqmEOfxW2yrL1sIX+06kBfbd/jOwq64dHvU0wpKKddDmfQq+CZy2h4ACnorXefCfvPhGwkJXu0ehwr1GW8zjroerL43pgr/Y8VoCYcrNe6FjMLsEKBUqKRNucGmt/GnXiC6wz/eeVKyv9sXk7Urn6wl9EGCJS0rpgiUuCc5zJCwRYEzaTqh4mwM/Vez0rkznGl/1vKW4hDqmtMQHl58f0gXvXboJvg2cUQ7+qqWbdElYvQe0HzSECjcJ8dZi/f0OHoKqWtSoLTzftRp613cngF+5eCP80v+uNubaoXEQlm3W2l2uOjjXfiR7FxljUo1abyR6/HjgrJYGJCtaPjYwPmtMbGB81k7k9Sb+uf8cPL5k46wwqwdeTkEirwRQr796HnxVM2k1c4ow1BpIOyaWgkReCKDeOHIBGmpaE8D0Ne0xTULOFwFUzJ82L29LALSnsRPiOvkTT2LOEED969iEcuPy83ate0E3CVR1ThFAvRmcgCfF9gRgY20H7SKg/7BlhQAqptId/uc0YIe37EvZj78XTBPgnxYZE7zZIoCKboOWP7Rlr3I+9Pp81nVcI1Dz0BMZEEh63MW3StyJbBBIp7eCEQU8glbX727ozIAAEd34Pp8q8cqVetz18NPBs+YJzLwQ89lobrXCvQY+5lJ3Uw9bqjidvgcoE0fQjXLxF5PLVae4D7oNb/l7BD5yWBV8JcaHVrvPgpyk8XD0tnwsUm2ZgEJieKI8Ho6+j1tqP/CIHA9Fr2QNfEEK8j+TfwHFqJqel8JZLQAAAABJRU5ErkJggg==">
                </span>
                <span v-else> - </span>
            </div>

            <div class="field scrollbar overflow-x-auto col-span-2 px-2">
                <div class="flex justify-center items-center">
                <span class="break-word">
                    <span><span class="font-semibold">Fecha ticket:</span> {{ formatDateBuy(data.buydate) }} <br></span>
                </span>

                </div>
            </div>

            <div class="field scrollbar overflow-x-auto px-2">
                <span class="break-word">
                    <span class="font-semibold">Participación:</span> {{ formatDate(data.created_at) }} <br>
<!--                    <span v-if="data.validated_at"><span class="font-semibold">Validación:</span> {{ formatDate(data.validated_at) }} <br></span>-->
                    <span v-if="data.confirmed_at"><span class="font-semibold">Confirmación:</span> {{ formatDate(data.confirmed_at) }} <br></span>
                </span>

            </div>

            <div class="field scrollbar overflow-x-auto px-2">
                 <span>
                     <span v-if="data?.mmgg.prize_id == 1"><span class="font-semibold">Premio:</span> Nintendo Switch</span>
                     <span v-else-if="data?.mmgg.prize_id == 2"><span class="font-semibold">Premio:</span> Tarjeta Streaming</span>
                     <br>
                     <br>
                     <span v-if="data?.mmgg"><span class="font-semibold">MMGG:</span> {{ formatDate(data.mmgg.date_moment) }}<br></span>
                     <span v-if="data.decline_reason"><span class="font-semibold">Razón rechazado:</span> {{ data.decline_reason }} <br></span>
                 </span>
            </div>

            <div class="field scrollbar overflow-x-auto space-x-1 px-2" v-if="!hideActions">

                <div v-if="reload" class="field scrollbar overflow-x-auto space-x-1 px-2">
                    <span class="w-[28px] cursor-pointer" @click="updateGameState('pending', 1)">
                        <img title="Reincoporar" class="w-[32px]" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFOklEQVR4nO1Ya2wUVRQeLD7i7+7OvVPatYBai++i2C69ty8pEKzSuEWqhQRTgo3SAIkxRvrQSmhntkKisfxQ0wQwYvyBWuWnSYOxCEUoKUQ02kJnSijYmVXsw3rNme7OzmzbdGd3diFmT3KSzZm7M9937z3nfudyXMpSlrKU/a/MjUk1j+kJHtFBHtG/eET+RpgoCJGfECafIETqBKEwk7tVDWEyijBl8/i/CNHjvFC4geN8adytZAiTr6IgEHZEf8aY5jgPBJE9CJPJuT9O/oExM//pS3NnrHwYY28Wxnl3ezz0rvT0QoxxkZfHZDuP6TcI0wnzu3hM/c4TwOTP+WaPR2QylndjTNN5TJt4REZ4RG/wfGHJTViBaY/mXY2MLdw7dD3LPxx4CBx+H2EsjePybocV4hJt8BGE6Pd2CEhX1AJJ0dpFRe2VFHVcUjRmdT12SlQ0f9uwmh/6H8ZkPca0Fsg5RgBh+r4J9NRcBBhjC9qGR6tFWT03E/A8Lqt9zzZ2tITzgrQ7At4t0DIzYDcm9bMRkIa0HFHWjtsGroT9taPdkUXiiTjh04UIkz7TrHwO0UgCohKoEmUtEA94Kej5z+80FQnay3Hcgpjhw0FjAqu6XBRFEpBkbaskq1NOgJcUjTX0/sqylpQb78e4qDxmAnBahg8c0mgQQ3RcjwnFk06Cl4K+7vV9BoGlj1aejhF8scdU78d4Pt9tLbF0rOKN/RNOg5eCqyBklkyvgFDEqtsPemMgQOpMCfV1ZLWJN2Hn8xXP1Rur8NL+wxfgm7YI8Jh2mo76V83PoFQmErykaMy352ODwNPbWpikBDbYI4Bob+gFLqGwwDr7MdR5m77j2x8MAo+tqmWirJ61RQBhesWo/e4S3pj9Ic2baPCSorHdJy8aBO5fXqXH/MrokzZWgIwZlWDp6jtDcZAHySCw97erBoFF2av0mKhoog0CwVKJKcvNzb0jFJ/WNokn0Dp4zSCQkVUWip+0swIj4TNgpQtioCBFRR1LBoHmvgGDwOLciuAKqGPTKjY6AqfDOUCfghjI4GSAlxSN7TzWYxB4pGRL+NnlG9H10wjRQ5FlFLR8sghs9B80CJS83GjERSXwYLQEXjH1rV8mm0CBb5dBYNMHR+wTcLmKl+i3B9OqcBzawGRtobf7L7GMrFJDSoC0sL2FZhFzDclK4vUNHxqzn7e2zjT7NpIYzI3pRpM2vw4HWqLLaHPfAPPcu8YgUNvZZSKg/cjZM18aj8h5k/7/DHrYRBIgNW8a4Jd5a5g4NBomIKutcbeUy9duSxiB6vZDlguD7Ue7Lc9FeTS2FpPHtMPcq27u+GLQafC1nV1MWFRsgF9d32YdI6tnuLiuVTDtMdo8gU69uO9T52b+vcMW8I+Xb2WtAyOWMX4l4OPiseBtWr95ienmt/SkixV409nfLXs+tO/fOX/ZunUUtdt2QzMXCfNKgHvuW8Mqmw7otTta4DAWSqXHVG1CM99yYSgS/FVR+SObc8pgO1lzIqQYS1lB1S49EXcc62HN5wZZ26VrusNviIE8gGuT0CGFTA57HhSoNWnVCVEJFHGJMLdQVBq5pWLxZd6aGdUmBN4vq5u4BNttvEBfWJxb0Q9HfrSgYSycsLWdXZY6b902CZr5uayy+UBx1bsfXSze0qjL33ty1jEhs0z37Aee0WOgKkGY7T71y5z5ISrqd47ueTsGlQJuD6ABt12VZPUMlEpHqo0TJirqCknW2kC/zCYAg7ETMMZWs34zDBQkyGDQ8uDw25aqTFnKuITZf6V3idEyxaqAAAAAAElFTkSuQmCC">
                    </span>
                </div>
                <div v-else class="field scrollbar overflow-x-auto space-x-1 px-2">
                    <span class="w-[28px] cursor-pointer" @click="updateGameState('request', 3)" v-if="personalImage">
                        <img title="Pedir DNI" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADeUlEQVR4nGNgGAWjYPAAMSk7P3FJu9PiEvY/JSTt/yNjkBhYTtzeh2EwAnEpO190R+PCg9IT4pJ2Z4j2gKT9KYbBBsSRko2wsBUvuryQkBkfcnJiGGxAAimEKVEzYGDUAwMNRmOAesCeRVzSrgxULGKrkIjBuEzGpkZCwj5DXML+G84iF1IBngG5CeQ2go6XkLTbT46jKfDAReLrD7sDeD0hLmlXTqnjQVhQ0IUf3WyQGCJU7X4QGwMSmJ4oI6o2FZO0q9LS0mIjEGXIek+T4MmTxJqrpaXFJiFhV43kgdO4HYGU5klxPFivuL0P0R6QsPMixWwVFQ92ompxbGm0/v9/lp7nHxu7n3981PP80398OHPl3v8GLin/pWRdMBwNEjN0Tf2ftXofXjN6cGBks0Bu6X7+sQHkNoIeADmeHAupjSWQ3AYXf/apnhgPPEY3rOvx+//lhy6CMYg9YB54/ukhER5AGNL97OP/6AnL/supeMDVyat6/o+ZtAIsNwAe+E+SB0KaZ+PMmCEtcwa3B+rP30XJnJrmUWCMnEnrL9wdvB5InrcZLmfqm/O/68kHMDb1yYaLJ8/fgtVy/+op/6VknYgqYqVkncDqqe6BqP5lcDmP/C64AR55nXBxkBpsHpBVciOpJpdVcqO+Bwq3n4DLySi4/Y/sXfI/qncJmA0TL9xxcvDGQPfTD/9NvBHJBR0beWSAk9SgzQMtN56CHYnLA8aemWA1g9IDnY/e/jd0SyUY/Ubu6f+7Hr8dfB6I6F6ESKMyjv99Kyb+L913Hox9yyf8l5R2RGTk3iWDzwNaltF4HRjRtRAur20dO7gycdudl4jSR9ENnJzQDQeJIZdGbXdfDZ5itP78XbiYunEozigGycHUgfQMmhjofPTuv6ZZBFjMObURpwdAciA1ILUgPYMqD7TeegGuyPA1nUFyIDUgtYMuE/cMAiwxIjwgjqVTP9AO74GWcohM7oLHA8hDIxJ21SBPDLTjux6//R/SguhIGTgn4/VAGd4iTsbxv1dhN4YlJXvO/lfWDSCprCcXh3XMx+0B6LjoAXwGgJoN6KWRV3EvXRxvCupIodmN5gGUwV2M2caBiAEpWRdwsgnvWIC1GGcgBIgZ0BpA/ICgB0CDR4PAof+x4mefagl6ADy0CPHEwwF38HM4fghyPMbQ4igYBQwkAwD0ccjeH0bwtgAAAABJRU5ErkJggg==">
                    </span>
    <!--                <span class="w-[28px] cursor-pointer" @click="updateGameState('awaiting', 2)">-->
    <!--                    <img title="Pedir Carta" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEWklEQVR4nO2ZXWwUVRSARxNNiBiDZPeeO21Fg1hTiZbaBIPsPbt16WIFY0xa0hcMlV+BNEACJpgKD6WW3RrKT3wAGpAYQx+qD/7wY/lp/CeWKPhAGo2UZJeAEHcfNAT0mjvt7p5Zdt2d2Zl1m/QkJzc7d+fc882599wzdzRtUiZlUgqQZ+8DwLcY4DADvAUcZXEqbgNgr6Zp92puS01Nzf3AxTfFO51FAQ+6DqGevCvOlwqCAQ6nBxMb1XQqxl7JIRiZ82o6FWuv5JEAMojT9hgX75khRJ/jELkAekbllEg0sScci1+PxBKyUKX2wtG4bFy7429XIXIBhKPxvVYczwYQiSUMiND6d6RrEDkBYvFrdgD0qmDKXufIVfchcgHYcV5p7QuvF5xiORfnyg5gzdFBS/uEVm4ASYja4HLTdJpQAFYWes+onDKhAcLRxImiIADEyHhWGPk/ACJj1w7ZBmDM9xgAblBtJsDW7y/J6voW24VcdX2LYSMfQDgW/1NzWpThJd2Hi65Gl3Qfvgvg0ScXGX2qTV6z7KDHg8B0XAaAuwBEBwAu1DTtnlJEYN1HQzLQ1mG0tgC8HFsZ4M0sgw7quq8qCVBK1QoVzv3PA0dzgUUrSMAf1DtB2QIAFxfT9Qj+6OWinXERZiD+Sl/3rSpLgMrK5x5OP23xh/qdnlainYB9UMga4BUBo0grGQAfmz7jU0V8Sft0HWtJ33krWaj78u+WnF22/2NZF1pptJYAAPyYcpKLnwGwOa1iI4nORTcj8MjMkHG/am0D/JcyXVh6C3NgJ5aOAgAX8bIHYByvAcf+pDLA42QNXJoAAOIM7WMMZ5MIXJhwAN6K+U/T/cGqUxuOfWdkle0XLrsHwFTlycWdcScP0D5dF3PIbjxsxfnFb/amHKqYsUAu3dfvDoASxtDPOK6fPn3egxoRAKwn0TmXz+nNp8/LQNvbcu4r7VkTQV1olcSlWw19aVOP7Pr1ujMAuYQx/1yyBr7NBzCnccVdTs+qbsqZ2VojR9wF8Oi+eWQNfJUPoGH5NpMjjWu7ZOdITDZt6pF6VYN5w9P98o3+U8UDeDw4VX0LUKW0V8cg7eNc+MgaGMoHsPPKDblu4Kxc/eEJ2TH8i6lPgbR/8rVc8f5ncuWRz+WWoZ+cykKiidzcb+7zCbJHnC3LNMoYLiKb1TFzBPwhYviUW87vvHIj5bw6N7I2hSrxcbJQ76jUmYoAx0ESgX1uOd/S1ZcCeKahzUYa5fgpXazqPdioRtNgtxkLPJU5+JqjX8gZT7xYUHldqDZ3HrQO4PEEZma+fTEufiN7wLvqf5kA81s3O+p83cLVsnv0pr00CoCdxNg/5OlfnTYt+FC243UnIqBXBY1p07yjz+S8GssSAGMLHmCAowRgDAJ8ryX/o77OuJmJIlSjCfVN2Zp4dfGy6XQCxEl6LqTOK8PRxG67HzoK0bCyHU302j4bBRCvMsABdSqRWRtNiuaM/Au4R4MR8XcE5wAAAABJRU5ErkJggg==">-->
    <!--                </span>-->

                    <span class="mx-2" v-if="personalImage">
                        |
                    </span>
                    <span v-if="!isRequestedGamesPage" class="w-[28px] cursor-pointer" @click="updateGameState('valid', 0)">
                        <img title="Accept" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADPUlEQVR4nO2YT0gUURzHRwnqUgdt9/3errbV2iWIOkn+2fdctSgRRSFiKaIiXYu0QEhELA8lIR6CqIQSEudPDR1DunQwkDpFkjukl6KgS4cOQVlYE29o1tlxxp2VdncG5gO/w+4sO5/v29/7M8txPj4+Pj4+LgChmiDCZBoB+YIw+QBAb0YidAvnBQKBeBQB/QiYqhkFdK68vHYr50l57IEQAZM8Avo9GKLNCJM+wPSPq0NUVDSG18o3NOnXEaa9rg4BQPrt5HUi0eZ+YwiE6SzH0U2cGwiE4/sRkK9aoVij+brwTtguKOKbntEhFYca0nOCtRfnFqqqjmxmZX5fXpIDfEqaFxRJZXV2+MrqpA7TZ0WRDQbrdyOgL1iVV9aG7D4nm+T5BVFtPd2dDlDXkvg8szSzJnRhl0og/U7l284kM5bVgYlRlU9JTzcUIhCK1SKgPGD6HICMlpVVb8tVnk3YUIgesOp5Pot8+7ke7ZpWKVHISR5hehEwWcncaMh7JpiLvNVqI5jlU6La0X0+Q77tdFILlQ6gSKr0Voo6lc9ckw3FBK1C5FueT4krDxflcO7yQOcwjp1gQnYh8i0vaC0kDWWVB4glzfJ63wPECGDybVWSfApU0CqAeIS1lvl4kHXCppzL84p4zYE87cm2lbNRBdzww/hLFGDkRxzI1+9FQJaznUOmFbHj6vTYcuXOJqu5URx5BgAZMqw0L63keUXqFBTpF/viEWFcNYawk8972+ggTK8bvvQxx3GldvJ6sRC79hxSI9Gm39WNx49xxZJfnaAZ/T+ph7CS12tqnteKV0RFXpChKPI6AOS26clocuo1324nv+bGTJidKAvR8zaUMmnjjVpPdS07kTeGKJa8bYgbT245DmDaOQsubwzxgN0wXBn/eWf2vqfkdUqCQXoQ47odgiIN5Eue3+iEzZVEX++jfdXtauLyJetRXOdIzF4XVZ6BgC5mFXKrPANhOr6emKvl/1GCMLln1deu7HmnS2zLyS6t3DzyWUN4SV6nFGFy1yzfmbzgCfk0AOQownSi5nDi1fDUmPWy6lZ5M1abnWfkdXhFHGT/HGiliIOcF5EXZDA+F/j4+HD/nb83fOooKWIiJgAAAABJRU5ErkJggg==">
                    </span>
                    <span class="w-[28px] cursor-pointer" @click="showMessageDialog = true">
                        <img title="Deny" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFiUlEQVR4nO2Za2hcRRSAb9s04C9NNbkz+0psaU02ja1N2mxLMrO73TSP3b1zEo3+EgvaQmPjA6GmilRQ+kPFH23++KC+wNLaChZBQfRPhYJv2lJUMIRUkWRjBR/FpGmPzM3u3bvXu4+b7t6o5MDAcu+dme/MOXPmzFlFWZIlWZIyCK9S1c6oStkzhLL3CWHfqIRdVAm/rBI+oxJ+iVB+VqXsHZXyEVUNtyuKslz5NwghvI1QPkkoRydNJXyCEHbwZv82z6IqoFL2olP4XEXYX4TyUZ8vtGoRLcB+JpSPEcIOqSq7u9Yb2eD1cp/PF7ohGAxWU8pv0b8jnfcRyl6zs5hKWEr2Vf4bwqvqPExTCTttY5VR+b6s08lVVCl7S27KOsoeLrUfHjiwHAcGGlHT+hFgLwrxuN7kb/lsYKDR449ouvXMShB+SlqvTPiDK1TKTpgG/74g9O7dKxFAoBDHUYhpBMCCTYjpVF/y3VB9JNcahJ8qiyUIZc/l+CrlI7bgg4PVKMQwAkwUhba0q0Lgo7fv+OcmJ+zwdcHX0bAglF8zwb9gCy9EJwpxwSk4AuA1ANy30QY+a4m7FgRfUxO7USXsx1yT5h4+qCjLEOBJFGKuXPCPtHThrvUxs8WnAoGOGscKyNU2wf9UX89vyoEfHFyBAK8uBLwQ/FUh8LekwLaGiPHc49SVams5UQn/M6tA+E6blX+lEvCY/ubDcNx45/PwOZ8v5HWy+k9nTci+UBRlWY4C0m0qCI/plly73fjm3qbYJ6XyL1cpG8+7+vMbdq7S8GixQmt9BC8nEh1F6SmNtJommFSU1pWWUHnBDXgEwFlNYHMguxfORONj8pwp5j4jpgjwhmX1h92Cx3R7yHQ+HG7vkQffUEEFCOXHDQVUvtNywk64CY8AeLSjz+i3a32XVGC8oBUIZedN4bPNtPrgNjwC4FexhNE3siaaeZ7I70KEpTIdZBpsUuCY2/AIgKm4ZvQP+sPzz4V4u4ACfMboEAxWG1klQMpteATAGQHGGAEPzygwLZlKVwCgaTHgEQD/SApjnDW+tAVk07Tb8rnQtNWF0vm86/AIgOM9SWOsLQ0RswJavk18zrqJSwmflYBHAPwyllWgd+327Lv+/gftLWC6vGTCKArxxGLAIwC+vrU3N4xm3+3PowDfb7pQHCmmQCXhEUCHzox7JNRTggJquD03leBV+h12EeBnLanEt91acRfSkzlZdEp3ktUDu01caXgEwJOd2VN4U31En7PoJtY3MmEHjX1A2KfWMOoGPALomzYz/qEtOe6TP4xK8fmi3nTFbP5G5I9omYPMLfj3TKt/qzeMlxKm8YWYlJeqvAroVqB81AQ5loprJ92C/zWhYUsgbMzx1B3dud8USiWyVgitMudFoYboaTfgEQBHTPPIi8zvScsc/f1xpRSRtUozsBvwCID3NGarEh+H49bVH0fuoOBlcSW9ySJUpeARAL/rTuLeli58c1uv3fs9ijPhVbImZFZA1m1k6aNSCmD+dr7oldJOZKHVqsTmhoh+6XYR/goCbHUMn2MJG3eSpY8PeFw/NUuFke73EY/jzmAMH2iO6VGnaD8h9inlEFmrtPuDQh75wy1d+h3261gCp+MazgqhX0h+SQg825XAEx19+NiGHbjRFCIJ5fhSqLcY/MtKOUXWKmW5z0vZXL4oVWoLeDh+FksUhJdlTKUSIst9smIm8xSn4NJiz27qxou9ed3nStncppjIitmZaOIHWbeR6W90dRSb/GH0e8L6CsvLOFsdxfubY/j85h78PJbAOVHQZc5d54Z1LnrdSIgh/aBZaKQRet89CwqVZVYkiUIcRSGmSoCekrmNrPU4OmHdkHQZfl36P7Mh408++VvTZIa7rmhW+X+XvwE/dF2qZeMYnwAAAABJRU5ErkJggg==">
                    </span>
                </div>
            </div>
        </div>

        <div class="w-100 gap-4" v-show="showMoreInfo">
            <GameItemData :game="data" @close="showMoreInfo = false" />
        </div>

        <!-- Loser Modal -->
        <DialogModal :show="showMessageDialog" @close="showMessageDialog = false">
            <template #title>
                Motivo
            </template>

            <template #content>
                <div>
                    <label for="text" class="font-brady text-[24px] text-cobalt">Motivo</label>
                    <TextArea type="text" id="text" v-model="declineMessage"
                              class="w-full"
                              rows="8"
                                placeholder="Escribe el motivo..."
                              :error="false" />
                </div>
            </template>

            <template #footer>
                <SecondaryButton @click="showMessageDialog = false">
                    Cancel
                </SecondaryButton>

                <PrimaryButton class="ml-4" @click="changeStateToLoser">
                    Enviar
                </PrimaryButton>
            </template>
        </DialogModal>


    </div>
</template>

<script setup>
import {computed, ref} from "vue";
import GameItemData from "@/Partials/Admin/Games/GameItemData.vue";
import {useToast} from "vue-toastification";
import SecondaryButton from "@/Components/Admin/SecondaryButton.vue";
import PrimaryButton from "@/Components/Admin/PrimaryButton.vue";
import TextArea from "@/Components/Admin/TextArea.vue";
import DialogModal from "@/Components/Admin/DialogModal.vue";
import {router, usePage} from "@inertiajs/vue3";
import TextInput from "@/Components/Admin/TextInput.vue";
import dayjs from 'dayjs';


const emit = defineEmits([
   'deleted'
]);

const props = defineProps({
    data: Object,
    isRequestedGamesPage: Boolean
});


const showMoreInfo = ref(false);
const showMessageDialog = ref(false);
const showCodeDialog = ref(false);
const declineMessage = ref('');
const code = ref('');
const hideActions = typeof usePage().props.hideActions !== 'undefined' ? usePage().props.hideActions : false;
const personalImage = typeof usePage().props.personalImage !== 'undefined' ? usePage().props.personalImage : false;
const isLoading = ref(false);
const reload = typeof usePage().props.reload !== 'undefined' ? usePage().props.reload : false;

const emailLink = computed(() => `mailto:${props.data.user.email}`);

function formatDate (dateString)  {
    const date = dayjs(dateString);
    return date.format('DD-MM-YYYY HH:mm:ss');
}

function formatDateBuy (dateString)  {
    const date = dayjs(dateString);
    return date.format('DD-MM-YYYY');
}

const changeStateToLoser = () => {
    updateGameState('denied', declineMessage.value);
    declineMessage.value = '';
    showMessageDialog.value = false;
}

const changeStateToAwaiting = () => {
    updateGameState('awaiting');
}


const updateGameState = async (action, message) => {
    let resp = null;
    let data = {};
    let error = null;
    let shouldEmit = action === 'winner' || action === 'denied' || action === 'valid' || action === 'request' || action === 'pending';

    isLoading.value = true;

    if (action === 'denied')
    {
        if (message?.length < 3) {
            window.toast = useToast();
            useToast().error('El mensaje debe tener al menos 3 caracteres.');
            return;
        } else {
            data['message'] = message;
        }
    }

    if (action === 'valid' || action === 'request')
    {
        data['type'] = message;
    }

    if (action === 'winner')
    {
        data['code'] = message;
    }

    try {
        resp = await axios.post(route('admin.games.state', {
            game: props.data.id,
            action: action
        }), data);
    } catch (e) {
        error = e;
    }

    isLoading.value = false;

    if (resp?.status == 200)
    {
        if (shouldEmit)
            emit('deleted', props.data.id);
        useToast().success('Acción realizada con éxito');
        return;
    }

    const msg = error?.response?.data?.message || 'Error desconocido';
    useToast().error(`Acción no realizada. (${msg})`);



};
</script>

<style scoped>
.game-item {
    --animate-duration: 0.25s;
}

.profile-img {
    @apply rounded-full h-[42px] mr-2
}

.field {
    @apply flex justify-center items-center;
}
</style>
