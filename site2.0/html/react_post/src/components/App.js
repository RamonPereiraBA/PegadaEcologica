import React from "react";
var lista_posts = [
    {
        "nome_do_post": "Post 1",
        "link_imagem": "https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE",
        "data": "15-05-2018",
        "link_post": "",
        "secao": "ecologia" 
      },
      {
        "nome_do_post": "Post 2",
        "link_imagem": "https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE",
        "data": "15-05-2018",
        "link_post": "",
        "secao": "projeto" 
      },
      {
        "nome_do_post": "Post 3",
        "link_imagem": "https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE",
        "data": "15-05-2018",
        "link_post": "",
        "secao": "ecologia" 
      },
      {
        "nome_do_post": "Post 4",
        "link_imagem": "https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE",
        "data": "15-05-2018",
        "link_post": "",
        "secao": "projeto" 
      },
      {
        "nome_do_post": "Post 5",
        "link_imagem": "https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE",
        "data": "15-05-2018",
        "link_post": "",
        "secao": "ecologia" 
      },
      {
        "nome_do_post": "Post 6",
        "link_imagem": "https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE",
        "data": "15-05-2018",
        "link_post": "",
        "secao": "programação do site" 
      }
]

function App(){
    function Post(props){
        return (
            <>
                <h2>Sobre {props.titulo}</h2>
                <div id={props.nome_div}>
                    {lista_posts.map((post_atual) => (
                    <>
                        { props.titulo === post_atual.secao &&(
                        <>
                        <img src={post_atual.link_imagem} />
                        <a href="https://media.licdn.com/dms/image/D4D22AQE6_1censMOvA/feedshare-shrink_800/0/1682281663348?e=1687392000&v=beta&t=WiqMwAUTCgs5ZG5efMrPAPVK-ETpSIoFDXez0kk9YqE">{post_atual.nome_do_post}</a>
                        <p>{post_atual.data}</p>
                        </>
                        )}
                    </>
                    ))}
                </div>
            </>
        )
    }

    return (
        <>
            <p><strong>Posts</strong></p>
            <p>A seguir estão, de forma organizada, os nossos posts do INSTAGRAM.</p>
            <Post titulo="ecologia" nome_div="ecologia"/>
            <Post titulo="projeto" nome_div="projeto"/>
            <Post titulo="programação do site" nome_div="programacao" />
        </>
    )

}

export default App;