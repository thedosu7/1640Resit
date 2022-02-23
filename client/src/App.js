import './App.css';
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
  );
}

export default App;
