import axios from "axios";
const API_URL = "http://localhost:3000/memes";

const apiClient = axios.create({
  baseURL: `${API_URL}`,
  withCredentials: false,
  headers: {
    Accept: "application/json",
    "Content-Type": "application/json",
  },
});

export default {
  getMemes() {
    return apiClient.get("/");
  },
};
