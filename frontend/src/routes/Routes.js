import React from 'react';
import { Routes, Route } from 'react-router-dom';
import Login from '../components/Login';
import Dashboard from '../components/Dashboard';
// import Listas from '../components/Listas';
import AuthMiddleware from '../middleware/AuthMiddleware';

const AppRoutes = () => {
    return (
        <Routes>
            <Route path="/login" element={<Login />} />
            <Route
                path="/dashboard"
                element={
                    <AuthMiddleware
                        element={<Dashboard />}
                        allowedRoles={['aluno', 'professor']}
                    />
                }
            />
            {/*<Route*/}
            {/*    path="/listas"*/}
            {/*    element={*/}
            {/*        <AuthMiddleware*/}
            {/*            element={<Listas />}*/}
            {/*            allowedRoles={['admin']}*/}
            {/*        />*/}
            {/*    }*/}
            {/*/>*/}
        </Routes>
    );
};

export default AppRoutes;
