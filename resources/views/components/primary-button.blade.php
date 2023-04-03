<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-red-800 uppercase tracking-widest hover:bg-red-800 dark:hover:bg-white focus:bg-red-800 dark:focus:bg-white active:bg-red-800 dark:active:bg-red-800 focus:outline-none focus:ring-2 focus:ring-red-800 focus:ring-offset-2 dark:focus:ring-offset-red-800 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
