import React, {useRef} from "react";
import Posts_json from "../posts.json";

function App(){
    function Post(props){
        const carrousel = useRef(null);

        const ir_esquerda = (e) => {
            e.preventDefault();
            carrousel.current.scrollLeft -= carrousel.current.offsetWidth;
        }

        const ir_direita = (e) => {
            e.preventDefault();
            carrousel.current.scrollLeft += carrousel.current.offsetWidth;
        }

        return (
            <>
                <h2>{props.titulo}</h2>
                <section className="divPost">
                  <div className="scrollPost" ref={carrousel}>
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
                  <button onClick={ir_esquerda}>esquerda</button>
                  <button onClick={ir_direita}>direita</button>
                </section>
            </>
        )
    }

    return (
        <>
            <h1>Posts</h1>
            <p>A seguir estão, de forma organizada, os nossos posts do INSTAGRAM.</p>
            <Post titulo="Sobre ecologia"/>
            <Post titulo="Sobre o projeto"/>
            <Post titulo="Sobre a programação do site" />
            <Post titulo="Nossos especiais"/>
        </>
    )

}

export default App;