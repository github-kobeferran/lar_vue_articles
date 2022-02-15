import axios from "axios";

const url = "/api/articles/";

class ArticleService {
    //Get Articles
    static getArticles() {
        return new Promise(async (resolve, reject) => {
            try {
                const res = await axios.get(url);
                const data = res.data;
                // console.log(data)
                resolve(data);
            } catch (err) {
                reject(err);
            }
        });
    }

    // Get Specific Article
    static getArticle(id) {
        return new Promise(async (resolve, reject) => {
            try {
                const res = await axios.get(`${url}${id}`);
                const data = res.data;

                resolve(data);
            } catch (err) {
                reject(err);
            }
        });
    }

    // STORE Article
    static storeArticle(article) {
        return new Promise(async (resolve, reject) => {
            try {
                const res = await axios.post(url, { ...article });
                const data = res.data;

                resolve(data);
            } catch (err) {
                reject(err);
            }
        });
    }

    // UPDATE Article
    static updateArticle(id, article) {
        return new Promise(async (resolve, reject) => {
            try {
                const res = await axios.put(`${url}${id}`, { ...article });
                const data = res.data;

                resolve(data);
            } catch (err) {
                reject(err);
            }
        });
    }

    // DELETE Article
    static deleteArticle(id) {
        return new Promise(async (resolve, reject) => {
            try {
                const res = await axios.delete(`${url}${id}`);
                const data = res.data;

                resolve(data);
            } catch (err) {
                reject(err);
            }
        });
    }

    // // Create Post
    // static insertPost(text) {
    //     return axios.post(url, {
    //         text,
    //     });
    // }

    // // Delete Post
    // static deletePost(id) {
    //     return axios.delete(`${url}${id}`);
    // }
}

export default ArticleService;
