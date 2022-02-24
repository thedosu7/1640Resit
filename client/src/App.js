import './App.css';
<<<<<<< HEAD
import Profile from './components/Profile';

function App() {
  return (
    <>
    <Profile></Profile>
    </>
=======
import React, { Suspense } from 'react';
import {
  Routes,
  Route,
} from "react-router-dom";

const HomePage = React.lazy(() => import("./pages/Home"));
const LoginPage = React.lazy(() => import("./pages/Login"));

function App() {
  return (
    <div className="App">
      <Suspense fallback={<div>Loading App</div>}>
        <Routes>
          <Route path="/" element={<HomePage />} />
          <Route path="/login" element={<LoginPage />} />
        </Routes>
      </Suspense>
    </div>
>>>>>>> b8ef18e4577091940dbd8b1deff78bc6994080c4
  );
}

export default App;
