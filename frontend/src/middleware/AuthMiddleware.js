import React from 'react';
import { Navigate } from 'react-router-dom';

const AuthMiddleware = ({ element, allowedRoles }) => {
    const access_token = localStorage.getItem('access_token');
    const role = localStorage.getItem('role');

    if (!role || !allowedRoles.includes(role) || !access_token) {
        return <Navigate to="/login" />;
    }

    return element;
};

export default AuthMiddleware;
