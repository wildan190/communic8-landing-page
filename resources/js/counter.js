document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    
    const animateCounter = (counter) => {
        const target = parseInt(counter.dataset.target);
        const duration = 2000; // Animation duration in milliseconds
        const steps = 50; // Number of steps in the animation
        const stepDuration = duration / steps;
        const increment = target / steps;
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current >= target) {
                counter.textContent = target;
                counter.classList.add('animated');
                return;
            }
            counter.textContent = Math.floor(current);
            setTimeout(updateCounter, stepDuration);
        };
        
        updateCounter();
    };

    // Create Intersection Observer
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !entry.target.classList.contains('animated')) {
                animateCounter(entry.target);
                entry.target.classList.add('animated');
            }
        });
    }, {
        threshold: 0.5
    });

    // Observe all counter elements
    counters.forEach(counter => observer.observe(counter));
});