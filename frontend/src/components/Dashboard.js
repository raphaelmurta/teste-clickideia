import React from 'react';
import { Routes, Route, Outlet } from 'react-router-dom';
import Sidebar from './Sidebar';

const Dashboard = () => {
    return (
        <div>
            <Sidebar />
            <div>
                <Outlet />
            </div>
        </div>
    );
};

export default Dashboard;
