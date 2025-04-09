from flask import Flask, request, jsonify
from flask_cors import CORS
from sentence_transformers import SentenceTransformer, util

app = Flask(__name__)
CORS(app)

model = SentenceTransformer('all-MiniLM-L6-v2')

pages = [
    {"title": "Home", "desc": "Welcome page with project highlights", "url": "index.php"},
    {"title": "Schemes", "desc": "Government and NGO schemes", "url": "index.php#schemes"},
    {"title": "Contact", "desc": "Get in touch with us", "url": "index.php#contact"},
    {"title": "Job Portal", "desc": "Find job opportunities", "url": "jobportal.php"},
    {"title": "Post Job", "desc": "Upload job listings", "url": "postjob.php"},
    {"title": "Profile", "desc": "User profile page", "url": "profile.php"},
    {"title": "Art Upload", "desc": "Upload your handmade artwork", "url": "artupload.php"},
    {"title": "Art Gallery", "desc": "View uploaded artworks", "url": "artgallery.php"}
]


descriptions = [p["desc"] for p in pages]
desc_embeddings = model.encode(descriptions)

@app.route("/search", methods=["POST"])
def search():
    query = request.json["query"]
    query_embedding = model.encode(query)
    scores = util.cos_sim(query_embedding, desc_embeddings)[0]
    best_match = pages[scores.argmax()]
    return jsonify(best_match)

if __name__ == "__main__":
    app.run(debug=True)
    