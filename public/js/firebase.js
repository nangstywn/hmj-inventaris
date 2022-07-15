// For Firebase JS SDK v7.20.0 and later, measurementId is optional


const firebaseConfig = {
    apiKey: "AIzaSyCWBjABPv41b_6t9A3qTyOO9LHj6mgOMZI",
    authDomain: "send-notification-f307a.firebaseapp.com",
    projectId: "send-notification-f307a",
    storageBucket: "send-notification-f307a.appspot.com",
    messagingSenderId: "11884063211",
    appId: "1:11884063211:web:24d1aa9a473f137b82d1ae",
    measurementId: "G-T9XBR5YQBP"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
//firebase.analytics();
const messaging = firebase.messaging();
	messaging
        .requestPermission()
        .then(function () {
                //MsgElem.innerHTML = "Notification permission granted." 
	            console.log("Notification permission granted.");
                // get the token in the form of promise
	            return messaging.getToken()
                }).then(function(token) {
                // print the token on the HTML page     
                $('#device_token').val(token)
                console.log(token);
                })
                .catch(function (err) {
	            console.log("Unable to get permission to notify.", err);
});

messaging.onMessage((payload) => {
    console.log(payload);
});

//device token
// fm6p3B6prkM:APA91bHYioYfBANfUTwDw7qlHAQWkLwkRHyrrmMMQo3nrKrQzHwDQBQmCUC53xyngLZvTMqfOkeghMxMD0K0u5lLXEGXVAPvrnFYpfnzDEmEaW10pUyZiUceUQ3rDJ9fHGT5-HuMbg-M
