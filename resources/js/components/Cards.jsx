import React from 'react';

const Card = ({ title, content }) => {
  return (
    <div className="col-lg-4 col-md-6 col-sm-12 mb-4">
      <div className="card">
        <div className="card-body">
          <p><strong>{title}:</strong> {content}</p>
        </div>
      </div>
    </div>
  );
}

export default Card;
