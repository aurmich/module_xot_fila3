<div
    x-data="{
        output: @entangle('output'),
        autoScroll: true,
        init() {
            this.$watch('output', () => {
                if (this.autoScroll) {
                    this.$nextTick(() => {
                        this.$refs.terminal.scrollTop = this.$refs.terminal.scrollHeight;
                    });
                }
            });
        }
    }"
    class="relative"
>
    <div
        x-ref="terminal"
        class="bg-gray-900 text-green-400 font-mono p-4 rounded-lg h-96 overflow-y-auto"
        style="font-family: 'Fira Code', monospace;"
    >
        <template x-for="(line, index) in output" :key="index">
            <div class="whitespace-pre-wrap" x-text="line"></div>
        </template>
<<<<<<< HEAD
<<<<<<< HEAD

        <div x-show="$wire.isRunning" class="animate-pulse">
<<<<<<< HEAD
            <span class="text-green-400">></span>
=======
        
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
        <div x-show="$wire.isRunning" class="animate-pulse">
<<<<<<< HEAD
<<<<<<< HEAD
            <span class="text-green-400"</span>
<<<<<<< HEAD
>>>>>>> e5c56c3 (.)
=======
=======
<<<<<<< HEAD
=======
            <span class="text-green-400"</span>
>>>>>>> c2dac53 (.)
            <span class="text-green-400"</span>
            <span class="text-green-400">></span>
<<<<<<< HEAD
>>>>>>> e2a4c5d (.)
>>>>>>> 50bb41c (fix: auto resolve conflict)
<<<<<<< HEAD
>>>>>>> d9307de (fix: auto resolve conflict)
=======
=======
            <span class="text-green-400">></span>
>>>>>>> 4ab3760 (.)
>>>>>>> 7b67053 (fix: auto resolve conflict)
=======
            <span class="text-green-400">></span>
>>>>>>> c2dac53 (.)
            <span class="animate-blink">_</span>
        </div>
    </div>

    <div class="absolute bottom-4 right-4 flex space-x-2">
        <button
            @click="autoScroll = !autoScroll"
            class="px-3 py-1 text-sm rounded-md"
            :class="autoScroll ? 'bg-green-600 text-white' : 'bg-gray-700 text-gray-300'"
        >
            Auto-scroll: <span x-text="autoScroll ? 'ON' : 'OFF'"></span>
        </button>
<<<<<<< HEAD
<<<<<<< HEAD

=======
        
>>>>>>> e5c56c3 (.)
=======

>>>>>>> 7b67053 (fix: auto resolve conflict)
        <button
            @click="$refs.terminal.scrollTop = $refs.terminal.scrollHeight"
            class="px-3 py-1 text-sm bg-gray-700 text-gray-300 rounded-md hover:bg-gray-600"
        >
            Scroll to Bottom
        </button>
    </div>
</div>

<style>
@keyframes blink {
    0%, 100% { opacity: 1; }
    50% { opacity: 0; }
}

.animate-blink {
    animation: blink 1s infinite;
}
<<<<<<< HEAD
<<<<<<< HEAD
</style>
=======
</style> 
>>>>>>> e5c56c3 (.)
=======
</style>
>>>>>>> 7b67053 (fix: auto resolve conflict)
