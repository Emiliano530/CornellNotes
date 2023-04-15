<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-cyan-900 border border-transparent rounded-3xl font-semibold text-xs text-white dark:text-white dark:hover:text-white uppercase tracking-widest hover:bg-cyan-700 dark:hover:bg-cyan-700 focus:bg-cyan-700 dark:focus:bg-cyan-900 active:bg-cyan-900 dark:active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>

