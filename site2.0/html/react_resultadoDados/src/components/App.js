import React from 'react';
import { useEffect, useState } from 'react';
import axios from 'axios';

function App(){
    const [json_media, setJson_media] = useState([]);

    useEffect (()=>{
      axios.get('http://localhost/site/pegadaecologica/site2.0/html/resultadoDados.php')
      .then(function(res) {
        setJson_media(res.data);
      })
    }, [])

    return (
        <>
            <h1>Posts</h1>
            <p>A seguir estão, de forma organizada, os nossos posts do INSTAGRAM.</p>
            <p>{json_media.media}</p>
        </>
    )

}

export default App;