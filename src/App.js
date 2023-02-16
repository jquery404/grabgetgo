import {BrowserRouter, Routes, Route} from 'react-router-dom';

import Home from './components/Home';
import About from './components/About';

function App() {

  return (
    <BrowserRouter>
      <Routes>
          <Route exact path="/" element={<Home />} />
          <Route exact path="/about" element={<About />} />
          <Route
            exact
            path="/vr"
            component={() => {
              window.location.replace('https://main.d3k4xctc06xt7i.amplifyapp.com/mrmacForms');
              return null;
            }}
          />
      </Routes>
    </BrowserRouter>
  );
}

export default App;