importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.9.0/firebase-messaging.js');

const firebaseConfig = {
            apiKey: "AIzaSyCWBjABPv41b_6t9A3qTyOO9LHj6mgOMZI",
            authDomain: "send-notification-f307a.firebaseapp.com",
            projectId: "send-notification-f307a",
            storageBucket: "send-notification-f307a.appspot.com",
            messagingSenderId: "11884063211",
            appId: "1:11884063211:web:24d1aa9a473f137b82d1ae",
            measurementId: "G-T9XBR5YQBP"
};
// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
firebase.initializeApp(firebaseConfig);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: 'https://images.theconversation.com/files/93616/original/image-20150902-6700-t2axrz.jpg' //your logo here
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});