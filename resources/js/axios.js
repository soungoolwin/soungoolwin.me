import axios from "axios";

const axiosInstance = axios.create({
    baseURL: "https://soungoolwin.me/api", // Replace with your API base URL
    withCredentials: true,
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute("content"),
    }, // Enable sending cookies along with requests
});

export default axiosInstance;
