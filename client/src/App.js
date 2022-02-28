import React, { Suspense } from 'react';
import {
  BrowserRouter,
  Routes,
  Route,
  Outlet,
} from "react-router-dom";
import HomePage from './pages/Home';
import LoginPage from './pages/Login';
import ProfilePage from './pages/Profile';
import axios from 'axios';
import { NavigationBar } from "./components";

axios.defaults.baseURL = "http://localhost:8000";
axios.defaults.headers.post['Content-Type'] = 'application/json';
axios.defaults.headers.post['Accept'] = 'application/json'; 
axios.defaults.withCredentials = true;

const MainLayout = () => (
  <div>
    <NavigationBar />
    <Outlet />
  </div>
)

function App() {
  return (
    <div className="App">
      <Suspense fallback={<div>Loading App</div>}></Suspense>
      <BrowserRouter>
        <Routes>
          <Route exact path="/login" element={<LoginPage />} />
          <Route element={<MainLayout />}>
            <Route path="/" element={<HomePage />} />
            <Route path="profile" element={<ProfilePage />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </div >
  );
}

export default App;
