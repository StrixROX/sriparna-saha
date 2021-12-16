const routes = [
    {
        path: "/",
        name: "Home",
        component: Home
    },
    {
        path: "/about",
        name: "About",
        component: About
    },
    {
        path: "/academia",
        name: "Acads",
        component: Acads
    },
    {
        path: "/work",
        name: "Work",
        component: Work
    },
    {
        path: "/awards",
        name: "Awards",
        component: Awards
    },
    {
        path: "/contact",
        name: "Contact",
        component: Contact
    }
];

const router = new VueRouter({
    routes: routes,
    mode: 'hash',
    base: '/src/'
});