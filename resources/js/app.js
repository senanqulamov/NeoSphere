import './bootstrap';


import Echo from "laravel-echo";

window.Echo = new Echo({
    broadcaster: "reverb",
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 8080,
    forceTLS: false,
    enabledTransports: ["ws", "wss"],
});

Echo.private(`App.Models.User.${user.id}`).notification((notification) => {
    console.log("Karma earned:", notification);
});
