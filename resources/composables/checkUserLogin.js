const checkUserLogin = async () => {
    try {
        const response = await fetch("/auth/check");

        return response.data; // Returns user information if logged in
    } catch (error) {
        if (error.response && error.response.status === 401) {
            return null; // User is not logged in
        }
        throw error; // Handle other errors
    }
};

export default checkUserLogin;
