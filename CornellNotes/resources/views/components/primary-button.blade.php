<button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-3xl font-semibold text-xs dark:text-white dark:hover:text-white text-white uppercase tracking-widest hover:bg-cyan-700 focus:bg-cyan-700 active:bg-cyan-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150 {{ isset($class) ? $class : 'dark:hover:bg-cyan-700 dark:bg-cyan-900 dark:focus:bg-cyan-900 dark:active:bg-cyan-900' }}">
    {{ $slot }}
</button>

