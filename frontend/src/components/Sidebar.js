import React from 'react';
import Drawer from '@mui/material/Drawer';
import List from '@mui/material/List';
import ListItem from '@mui/material/ListItem';
import ListItemIcon from '@mui/material/ListItemIcon';
import ListItemText from '@mui/material/ListItemText';
import Button from '@mui/material/Button';
import { Link } from 'react-router-dom';
import DashboardIcon from '@mui/icons-material/Dashboard';
import AssignmentIcon from '@mui/icons-material/Assignment';
import PersonIcon from '@mui/icons-material/Person';

const drawerWidth = 240;

const Sidebar = () => {
    const handleLogout = () => {
        localStorage.removeItem('role');
        localStorage.removeItem('access_token');
        window.location.href = '/login';
    };

    return (
        <Drawer
            variant="permanent"
            sx={{
                width: drawerWidth,
                flexShrink: 0,
                '& .MuiDrawer-paper': {
                    width: drawerWidth,
                },
            }}
        >
            <List>
                <ListItem button component={Link} to="/dashboard">
                    <ListItemIcon>
                        <DashboardIcon />
                    </ListItemIcon>
                    <ListItemText primary="Dashboard" />
                </ListItem>
                <ListItem button component={Link} to="/criar-aula">
                    <ListItemIcon>
                        <AssignmentIcon />
                    </ListItemIcon>
                    <ListItemText primary="Criar Aula" />
                </ListItem>
                <ListItem button component={Link} to="/minhas-aulas">
                    <ListItemIcon>
                        <AssignmentIcon />
                    </ListItemIcon>
                    <ListItemText primary="Minhas Aulas" />
                </ListItem>
                <ListItem button component={Link} to="/perfil">
                    <ListItemIcon>
                        <PersonIcon />
                    </ListItemIcon>
                    <ListItemText primary="Perfil" />
                </ListItem>
            </List>
            <Button
                variant="outlined"
                color="primary"
                onClick={handleLogout}
                sx={{ marginTop: 'auto'}}
            >
                Logout
            </Button>
        </Drawer>
    );
};

export default Sidebar;
