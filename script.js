document.addEventListener("DOMContentLoaded", function() {
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener('click', function() {
            const url = card.getAttribute('data-url');
            window.location.href = url;
        });
    });
});
        document.addEventListener('DOMContentLoaded', function () {
            fetchJobs();

            document.getElementById('search').addEventListener('input', fetchJobs);
            document.getElementById('remote').addEventListener('change', fetchJobs);
            document.getElementById('training').addEventListener('change', fetchJobs);
        });

        function fetchJobs() {
            const search = document.getElementById('search').value;
            const remote = document.getElementById('remote').checked ? 1 : 0;
            const training = document.getElementById('training').checked ? 1 : 0;

            fetch(`fetch_jobs.php?search=${search}&remote=${remote}&training=${training}`)
                .then(response => response.json())
                .then(jobs => {
                    const jobListings = document.getElementById('job-listings');
                    jobListings.innerHTML = '';
                    jobs.forEach(job => {
                        const jobElement = document.createElement('div');
                        jobElement.className = 'job';
                        jobElement.innerHTML = `
                            <h3>${job.title}</h3>
                            <p>${job.description}</p>
                            <p>Company: ${job.company}</p>
                            <p>Location: ${job.location}</p>
                            <p>Salary: ${job.salary}</p>
                            <p>Application Deadline: ${job.application_deadline}</p>
                            <p>Remote Work: ${job.remote_work ? 'Yes' : 'No'}</p>
                            <p>Training Provided: ${job.training_provided ? 'Yes' : 'No'}</p>
                        `;
                        jobListings.appendChild(jobElement);
                    });
                });
        }
        const toggle = document.querySelector(".toggle"),
        input = document.querySelector(".password");
      toggle.addEventListener("click", () => {
        if (input.type === "password") {
          input.type = "text";
          toggle.classList.replace("fa-eye-slash", "fa-eye");
        } else {
          input.type = "password";
        }
      })
      // Sample data for illustration
const artData = [
    { title: 'Art 1', imageUrl: 'art1.jpg' },
    { title: 'Art 2', imageUrl: 'art2.jpg' },
    { title: 'Art 3', imageUrl: 'art3.jpg' }
];

const gallery = document.getElementById('gallery');

function addArtToGallery(art) {
    const artItem = document.createElement('div');
    artItem.classList.add('art-item');
    
    const img = document.createElement('img');
    img.src = art.imageUrl;
    img.alt = art.title;
    
    artItem.appendChild(img);
    gallery.appendChild(artItem);
}

// Add all art items to the gallery
artData.forEach(addArtToGallery);
const addArtForm = document.getElementById('addArtForm');

addArtForm.addEventListener('submit', function(event) {
    event.preventDefault();
    
    const title = document.getElementById('artTitle').value;
    const imageUrl = document.getElementById('artUrl').value;
    
    const newArt = { title, imageUrl };
    addArtToGallery(newArt);
    
    // Optionally, reset the form
    addArtForm.reset();
});