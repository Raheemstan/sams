import React from "react";
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Student from "./view/Student";
import Addstudent from "./view/Addstudent";

function App() {
  return (
    <Router>
      <Routes>
        <Route exact path="/" element={<Student />} />
        <Route path="/add-student" element={<Addstudent />} />
      </Routes>
    </Router>
  );
}

export default App;
