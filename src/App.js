import {BrowserRouter, Routes, Route} from 'react-router-dom';

import Home from './components/Home';
import About from './components/About';

export default function App() {

  return (
    <BrowserRouter>
      <Routes>
          <Route exact path="/" element={<Home />} />
          <Route exact path="/about" element={<About />} />
          <Route path="/vr" element={<VR />} />
      </Routes>
    </BrowserRouter>
  );
}

function VR() {
  window.location.href = 'https://main.d3k4xctc06xt7i.amplifyapp.com/mrmacForms';
  return null;
}