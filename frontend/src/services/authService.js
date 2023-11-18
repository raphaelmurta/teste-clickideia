const API_URL = process.env.REACT_APP_API_URL;

export const login = async (email, password) => {
    const response = await fetch(`${API_URL}/login`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email, password })
    });

    if (!response.ok) {
        throw new Error('Erro de autenticação');
    }

    return response.json();
};
