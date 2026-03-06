export function theme() {
    return {
        dark: false,
        init() {
            const stored = localStorage.getItem('theme');
            this.dark = stored ? stored === 'dark' : false;
            this.apply();
        },
        toggle() {
            this.dark = !this.dark;
            localStorage.setItem('theme', this.dark ? 'dark' : 'light');
            this.apply();
        },
        apply() {
            document.documentElement.classList.toggle('dark', this.dark);
        },
    };
}

