        // Load the Facebook SDK
        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));

        // Initialize the SDK
        window.fbAsyncInit = function () {
            FB.init({
                appId: '761251156943127', // <-- Replace with your actual Facebook App ID
                cookie: true,
                xfbml: true,
                version: 'v24.0'
            });

            // Handle button click
            document.getElementById('fbLoginBtn').addEventListener('click', function () {
                FB.login(function (response) {
                    if (response.authResponse) {
                                console.log('Welcome! Fetching your information....');
                                FB.api('/me', { fields: 'name,email,picture' }, function (userInfo) {
                                    document.getElementById("profile").innerHTML = `
                        <p>👋 Hello, <strong>${userInfo.name}</strong>!</p>
                        <p>Your email: <strong>${userInfo.email}</strong></p>
                        <img src="${userInfo.picture.data.url}" alt="Profile Picture">
                        `;
                        });
                    } else {
                        alert('Login cancelled or not fully authorized.');
                    }
                }, { scope: 'email' });
            });
        };