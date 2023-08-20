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
                <section className="divPost">
                <h3>{props.titulo}</h3>
                  <div className="scrollPost" ref={carrousel}>
                    {Posts_json.map((post_atual) => (
                        <>
                        { props.titulo === post_atual.secao &&(
                        <>
                        <div className="post">
                          {/* <img src={post_atual.link_imagem} /> */}
                          <a href={post_atual.link_post}>{post_atual.nome_do_post}</a>
                          <p>{post_atual.data}</p>
                        </div>
                        </>
                        )}
                    </>
                    ))}
                  </div>
                    {/* <div className="scrollPost-botoes">
                        <button className="bt-esquerda" onClick={ir_esquerda}>esquerda</button>
                        <button className="bt-direita" onClick={ir_direita}>direita</button>
                    </div> */}
                </section>
            </>
        )
    }

    return (
        <>
            <header>
                <h1>
                    Conheça nossas <br/>
                    <span>
                        <i>
                            REDES SOCIAIS 🌎
                        </i>
                    </span>
                </h1>
            </header>
            <section id="explicacao">
                <p>Com o objetivo de divulgar nosso trabalho, criamos um <a href=""><i>Instagram</i></a> e <a href=""><i>Linkedin</i></a> para o projeto.</p>
                <p>Essa página tem o intuito de organizar nossas publicações no Instagram através de TÓPICOS.</p>
            </section>
            <section id="posts">
                <section id="posts-ecologia">
                    <Post titulo="ECOLOGIA 🍀"/>
                </section>
                <section id="posts-projeto">
                    <Post titulo="PROJETO 📁"/>
                </section>
                <section id="posts-programacao">
                    <Post titulo="PROGRAMAÇÃO DO SITE  🖥️ " />
                </section>
                <section id="posts-especial">
                    <Post titulo="ESPECIAIS ✨"/>
                </section>
            </section>
            <footer>

            </footer>
        </>
    )

}

export default App;