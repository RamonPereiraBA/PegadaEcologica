import React from "react";
import Posts_json from "../posts.json";

function App(){
    function Post(props){
        return (
            <>
                <h2>{props.titulo}</h2>
                <section className="divPost">
                  <div className="scrollPost">
                    {Posts_json.map((post_atual) => (
                    <>
                        { props.titulo === post_atual.secao &&(
                        <>
                        <div className="post">
                          <img src={post_atual.link_imagem} />
                          <a href={post_atual.link_post}>{post_atual.nome_do_post}</a>
                          <p>{post_atual.data}</p>
                        </div>
                        </>
                        )}
                    </>
                    ))}
                  </div>
                </section>
            </>
        )
    }

    return (
        <>
            <h1>Posts</h1>
            <p>A seguir estão, de forma organizada, os nossos posts do INSTAGRAM.</p>
            <Post titulo="Sobre ecologia"/>
            <Post titulo="Sobre projeto"/>
            <Post titulo="Sobre programação do site" />
            <Post titulo="Nossos especiais"/>
        </>
    )

}

export default App;