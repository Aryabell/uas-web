import './bootstrap';
document.addEventListener('DOMContentLoaded', () => {
    let page = 1; // Halaman pertama sudah ditampilkan

    document.getElementById('load-more').addEventListener('click', function () {
        page++;
        fetch(`/announcements?page=${page}`)
            .then(response => response.json())
            .then(data => {
                if (data.announcements.length > 0) {
                    const container = document.getElementById('news-container');
                    data.announcements.forEach(announcement => {
                        const div = document.createElement('div');
                        div.className = 'flex justify-between items-center bg-gray-100 p-3 rounded-lg';
                        div.innerHTML = `
                            <div>
                                <h4 class="text-sm font-bold text-gray-800">${announcement.title}</h4>
                                <p class="text-xs text-gray-600">${announcement.description}</p>
                            </div>
                            <a href="#" class="text-blue-600 font-bold text-sm">></a>
                        `;
                        container.appendChild(div);
                    });
                } else {
                    this.disabled = true;
                    this.textContent = 'No More Announcements';
                    this.classList.add('bg-gray-300', 'cursor-not-allowed');
                }
            })
            .catch(error => console.error('Error loading more announcements:', error));
    });
});
