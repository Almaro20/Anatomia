import React from 'react';

const Sidebar = () => {
    return (
        <aside className="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" className="brand-link">
                <span className="brand-text font-weight-light">LOGO</span>
            </a>
            <div className="sidebar">
                <nav className="mt-2">
                    <ul className="nav nav-pills nav-sidebar flex-column" role="menu">
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <p>Inicio</p>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <p>Informe</p>
                            </a>
                        </li>
                        <li className="nav-item">
                            <a href="#" className="nav-link">
                                <p>Contacto</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
    );
};

export default Sidebar;
