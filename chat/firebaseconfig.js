// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";
// import { initializeAppCheck, ReCaptchaV3Provider } from "firebase/app-check";

console.log(process.env.API_KEY);
console.log(process.env.AUTH_DOMAIN);
console.log(process.env.PROJECT_ID);
console.log(process.env.STORAGE_BUCKET);
console.log(process.env.MESSAGING_SENDER_ID);
console.log(process.env.APP_ID);

// Your web app's Firebase configuration
const firebaseConfig = {
  
  apiKey: "AIzaSyAoZ5XVXwdE_cXwZ9yjZnBrZ93XbL1TNm0",
        authDomain: "bnrazaq-2.firebaseapp.com",
        databaseURL: "https://bnrazaq-2-default-rtdb.firebaseio.com",
        projectId: "bnrazaq-2",
        storageBucket: "bnrazaq-2.appspot.com",
        messagingSenderId: "318840610848",
        appId: "1:318840610848:web:1a8ee51eeaff2ce8e41c45"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth();
const db = getFirestore();
// const appCheck = initializeAppCheck(app, {
//   provider: new ReCaptchaV3Provider(process.env.RECAPTCHA),
//   isTokenAutoRefreshEnabled: true,
// });

export { auth, db };
