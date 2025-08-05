;(function ($) {
    'use strict';

    $(document).ready(function () {
        // Wait for SupaWP to be available
        const waitForSupaWP = setInterval(() => {
            // Check if SupaWPConfig is available (this means SupaWP is loaded)
            if (typeof window.SupaWPConfig !== 'undefined') {
                // Try to get the Supabase client
                // Note: We need to wait for the SupaWP script to fully initialize
                const supabaseClient = window.supabase || window.supawp?.client;

                if (supabaseClient) {
                    // Clear the interval since we found the client
                    clearInterval(waitForSupaWP);

                    // Initialize your custom SupaWP functionality here
                    initSupaWPTemplate(supabaseClient);
                }
            }
        }, 2000); // Check every 2 seconds

        // Timeout after 30 seconds to prevent infinite loops
        setTimeout(() => {
            clearInterval(waitForSupaWP);
        }, 30000);
    });

    function initSupaWPTemplate(supabaseClient) {
        // Your custom SupaWP functionality goes here

        // Example: Listen for auth state changes
        supabaseClient.auth.onAuthStateChange((event, session) => {
            if (event === 'SIGNED_IN') {
                // User signed in
                console.log('User signed in:', session?.user?.email);
            } else if (event === 'SIGNED_OUT') {
                // User signed out
                console.log('User signed out');
            }
        });
    }

})(jQuery);
