import React from 'react';
import Card from './Card';

const MainContent = () => {
  return (
    <section className="content">
      <div className="container-fluid">
        <div className="row justify-content-center">
          <Card 
            title="Organización de la información" 
            content="Elaborar un informe permite estructurar los datos de manera lógica y comprensible, facilitando su análisis. Esto ayuda a evitar confusión y mejora la comunicación en entornos empresariales y académicos."
          />
          <Card 
            title="Toma de decisiones fundamentadas" 
            content="Un informe bien elaborado proporciona datos precisos y análisis detallados, lo que facilita la evaluación de situaciones y permite tomar decisiones estratégicas con mayor confianza."
          />
          <Card 
            title="Registro y seguimiento" 
            content="Los informes permiten llevar un registro de actividades, avances y problemas. Esto es fundamental para el seguimiento de proyectos, auditorías y mejoras continuas dentro de una organización."
          />
        </div>
      </div>
    </section>
  );
}

export default MainContent;
