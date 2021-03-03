import './App.css';

function App() {
  fetch("https://swapi.dev/api/people/?format=json").then(
    r => r.json()).then(
      r => 
      this.setState({
        items: r.results
      })
      
    )

  var items = this.state;

  return (
    
    <div className="App">
        <h1>Andres mamon</h1>
        <ul>
          {items.map(item => (
            <li>
              {item.name} 
            </li>
          ))}
        </ul>
    </div>
  );
}

export default App;
