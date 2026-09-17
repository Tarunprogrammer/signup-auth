// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAnalytics } from "firebase/analytics";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyB7m-VfxlFjV96ENeN2-N6B9QzsPGorpoA",
  authDomain: "panindia-d5ba0.firebaseapp.com",
  projectId: "panindia-d5ba0",
  storageBucket: "panindia-d5ba0.firebasestorage.app",
  messagingSenderId: "498447954142",
  appId: "1:498447954142:web:71b601d0d966408ac1524f",
  measurementId: "G-1CN7GD2XK1"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);