import React from 'react'
import ReactDOM from 'react-dom/client';
import 'bootstrap/dist/css/bootstrap.css';

const App = () => {
  return (
    <div>
      <h1>Hello, World!</h1><div>App</div>
      <button className='btn btn-primary'>Button</button>
    </div>
  )
}

export default App

if (document.getElementById('root')) {
  const Index = ReactDOM.createRoot(document.getElementById("root"));

  Index.render(
      <React.StrictMode>
          <App/>
      </React.StrictMode>
  )
}