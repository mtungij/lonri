
const defaultTheme = require("tailwindcss/defaultTheme");
const forms = require("@tailwindcss/forms");

module.exports = {
    darkMode: "class", // or 'media', depending on your preference
   
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./node_modules/flowbite/**/*.js",
        './vendor/masmerise/livewire-toaster/resources/views/*.blade.php', // 👈
       
       
          
    ],
    theme: {
        extend: {

            colors: {
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a","950":"#172554"}
               
              },
            fontFamily: {
                sans: ["Poppins", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [forms, require("flowbite/plugin")],
};
