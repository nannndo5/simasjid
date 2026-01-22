/**
 * Islamic Center Website - Main JavaScript
 * Handles mobile menu toggle and image lazy loading
 */

// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    // Dropdown Toggle Function - Generic setup for all dropdowns
    function setupDropdowns() {
        // Find all dropdown buttons
        const dropdownButtons = document.querySelectorAll('[id*="dropdown-button"]');
        
        dropdownButtons.forEach(function(button) {
            // Get the container, dropdown, and chevron based on button ID
            const container = button.closest('[id*="dropdown-container"]') || button.parentElement;
            const dropdownId = button.id.replace('button', 'dropdown').replace('-auth', '');
            const chevronId = button.id.replace('button', 'chevron').replace('-auth', '');
            
            // Try to find dropdown and chevron by ID or by DOM structure
            let dropdown = document.getElementById(dropdownId);
            if (!dropdown && container) {
                dropdown = container.querySelector('[id*="dropdown"]:not([id*="button"]):not([id*="container"]):not([id*="chevron"])');
            }
            
            let chevron = document.getElementById(chevronId);
            if (!chevron && container) {
                chevron = container.querySelector('[id*="chevron"]') || button.querySelector('svg');
            }
            
            if (button && dropdown) {
                button.addEventListener('click', function(e) {
                    e.stopPropagation();
                    e.preventDefault();
                    
                    const isHidden = dropdown.classList.contains('hidden');
                    
                    // Close all other dropdowns
                    document.querySelectorAll('[id*="dropdown"]:not([id*="button"]):not([id*="container"]):not([id*="chevron"])').forEach(function(dropdownElement) {
                        if (dropdownElement !== dropdown) {
                            dropdownElement.classList.add('hidden');
                        }
                    });
                    
                    // Reset all chevrons
                    document.querySelectorAll('[id*="chevron"]').forEach(function(chevronElement) {
                        if (chevronElement !== chevron) {
                            chevronElement.classList.remove('rotate-180');
                        }
                    });
                    
                    // Toggle current dropdown
                    if (isHidden) {
                        dropdown.classList.remove('hidden');
                        if (chevron) chevron.classList.add('rotate-180');
                        button.setAttribute('aria-expanded', 'true');
                    } else {
                        dropdown.classList.add('hidden');
                        if (chevron) chevron.classList.remove('rotate-180');
                        button.setAttribute('aria-expanded', 'false');
                    }
                });
            }
        });
    }
    
    // Setup all dropdowns
    setupDropdowns();
    
    // Setup mobile menu dropdowns specifically
    function setupMobileDropdowns() {
        // Mobile Perpustakaan dropdown (authenticated users)
        const mobilePerpustakaanButton = document.getElementById('mobile-perpustakaan-dropdown-button');
        const mobilePerpustakaanDropdown = document.getElementById('mobile-perpustakaan-dropdown');
        const mobilePerpustakaanChevron = document.getElementById('mobile-perpustakaan-chevron');
        
        if (mobilePerpustakaanButton && mobilePerpustakaanDropdown) {
            mobilePerpustakaanButton.addEventListener('click', function(e) {
                e.stopPropagation();
                const isHidden = mobilePerpustakaanDropdown.classList.contains('hidden');
                
                // Close other mobile dropdowns
                const mobileLayananDropdown = document.getElementById('mobile-layanan-dropdown');
                if (mobileLayananDropdown) mobileLayananDropdown.classList.add('hidden');
                const mobileLayananChevron = document.getElementById('mobile-layanan-chevron');
                if (mobileLayananChevron) mobileLayananChevron.classList.remove('rotate-180');
                
                if (isHidden) {
                    mobilePerpustakaanDropdown.classList.remove('hidden');
                    if (mobilePerpustakaanChevron) mobilePerpustakaanChevron.classList.add('rotate-180');
                    mobilePerpustakaanButton.setAttribute('aria-expanded', 'true');
                } else {
                    mobilePerpustakaanDropdown.classList.add('hidden');
                    if (mobilePerpustakaanChevron) mobilePerpustakaanChevron.classList.remove('rotate-180');
                    mobilePerpustakaanButton.setAttribute('aria-expanded', 'false');
                }
            });
        }
        
        // Mobile Layanan dropdown (authenticated users)
        const mobileLayananButton = document.getElementById('mobile-layanan-dropdown-button');
        const mobileLayananDropdown = document.getElementById('mobile-layanan-dropdown');
        const mobileLayananChevron = document.getElementById('mobile-layanan-chevron');
        
        if (mobileLayananButton && mobileLayananDropdown) {
            mobileLayananButton.addEventListener('click', function(e) {
                e.stopPropagation();
                const isHidden = mobileLayananDropdown.classList.contains('hidden');
                
                // Close other mobile dropdowns
                if (mobilePerpustakaanDropdown) mobilePerpustakaanDropdown.classList.add('hidden');
                if (mobilePerpustakaanChevron) mobilePerpustakaanChevron.classList.remove('rotate-180');
                
                if (isHidden) {
                    mobileLayananDropdown.classList.remove('hidden');
                    if (mobileLayananChevron) mobileLayananChevron.classList.add('rotate-180');
                    mobileLayananButton.setAttribute('aria-expanded', 'true');
                } else {
                    mobileLayananDropdown.classList.add('hidden');
                    if (mobileLayananChevron) mobileLayananChevron.classList.remove('rotate-180');
                    mobileLayananButton.setAttribute('aria-expanded', 'false');
                }
            });
        }
        
        // Mobile Perpustakaan dropdown (guests)
        const mobilePerpustakaanButtonGuest = document.getElementById('mobile-perpustakaan-dropdown-button-guest');
        const mobilePerpustakaanDropdownGuest = document.getElementById('mobile-perpustakaan-dropdown-guest');
        const mobilePerpustakaanChevronGuest = document.getElementById('mobile-perpustakaan-chevron-guest');
        
        if (mobilePerpustakaanButtonGuest && mobilePerpustakaanDropdownGuest) {
            mobilePerpustakaanButtonGuest.addEventListener('click', function(e) {
                e.stopPropagation();
                const isHidden = mobilePerpustakaanDropdownGuest.classList.contains('hidden');
                
                // Close other mobile dropdowns
                const mobileLayananDropdownGuest = document.getElementById('mobile-layanan-dropdown-guest');
                if (mobileLayananDropdownGuest) mobileLayananDropdownGuest.classList.add('hidden');
                const mobileLayananChevronGuest = document.getElementById('mobile-layanan-chevron-guest');
                if (mobileLayananChevronGuest) mobileLayananChevronGuest.classList.remove('rotate-180');
                
                if (isHidden) {
                    mobilePerpustakaanDropdownGuest.classList.remove('hidden');
                    if (mobilePerpustakaanChevronGuest) mobilePerpustakaanChevronGuest.classList.add('rotate-180');
                    mobilePerpustakaanButtonGuest.setAttribute('aria-expanded', 'true');
                } else {
                    mobilePerpustakaanDropdownGuest.classList.add('hidden');
                    if (mobilePerpustakaanChevronGuest) mobilePerpustakaanChevronGuest.classList.remove('rotate-180');
                    mobilePerpustakaanButtonGuest.setAttribute('aria-expanded', 'false');
                }
            });
        }
        
        // Mobile Layanan dropdown (guests)
        const mobileLayananButtonGuest = document.getElementById('mobile-layanan-dropdown-button-guest');
        const mobileLayananDropdownGuest = document.getElementById('mobile-layanan-dropdown-guest');
        const mobileLayananChevronGuest = document.getElementById('mobile-layanan-chevron-guest');
        
        if (mobileLayananButtonGuest && mobileLayananDropdownGuest) {
            mobileLayananButtonGuest.addEventListener('click', function(e) {
                e.stopPropagation();
                const isHidden = mobileLayananDropdownGuest.classList.contains('hidden');
                
                // Close other mobile dropdowns
                if (mobilePerpustakaanDropdownGuest) mobilePerpustakaanDropdownGuest.classList.add('hidden');
                if (mobilePerpustakaanChevronGuest) mobilePerpustakaanChevronGuest.classList.remove('rotate-180');
                
                if (isHidden) {
                    mobileLayananDropdownGuest.classList.remove('hidden');
                    if (mobileLayananChevronGuest) mobileLayananChevronGuest.classList.add('rotate-180');
                    mobileLayananButtonGuest.setAttribute('aria-expanded', 'true');
                } else {
                    mobileLayananDropdownGuest.classList.add('hidden');
                    if (mobileLayananChevronGuest) mobileLayananChevronGuest.classList.remove('rotate-180');
                    mobileLayananButtonGuest.setAttribute('aria-expanded', 'false');
                }
            });
        }
    }
    
    // Setup mobile dropdowns
    setupMobileDropdowns();
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(event) {
        const clickedInsideDropdown = event.target.closest('[id*="dropdown-container"]') || 
                                     event.target.closest('[id*="dropdown-button"]') ||
                                     event.target.closest('[id*="dropdown"]:not([id*="button"]):not([id*="container"]):not([id*="chevron"])');
        
        if (!clickedInsideDropdown) {
            document.querySelectorAll('[id*="dropdown"]:not([id*="button"]):not([id*="container"]):not([id*="chevron"])').forEach(function(dropdownElement) {
                dropdownElement.classList.add('hidden');
            });
            
            document.querySelectorAll('[id*="dropdown-button"]').forEach(function(button) {
                button.setAttribute('aria-expanded', 'false');
            });
            
            document.querySelectorAll('[id*="chevron"]').forEach(function(chevron) {
                chevron.classList.remove('rotate-180');
            });
        }
    });
    
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (mobileMenuButton && mobileMenu && menuIcon && closeIcon) {
        mobileMenuButton.addEventListener('click', function() {
            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                // Show menu
                mobileMenu.classList.remove('hidden');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'true');
            } else {
                // Hide menu
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            }
        });

        // Close menu when clicking outside (optional)
        document.addEventListener('click', function(event) {
            const isClickInside = mobileMenuButton.contains(event.target) || mobileMenu.contains(event.target);
            if (!isClickInside && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            }
        });

        // Close menu on escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
                mobileMenuButton.setAttribute('aria-expanded', 'false');
            }
        });
    }

    // Lazy load images with fade-in effect
    const lazyImages = document.querySelectorAll('img[loading="lazy"]');
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver(function(entries, observer) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    img.classList.add('loaded');
                    imageObserver.unobserve(img);
                }
            });
        });

        lazyImages.forEach(function(img) {
            imageObserver.observe(img);
        });
    } else {
        // Fallback for browsers without IntersectionObserver
        lazyImages.forEach(function(img) {
            img.classList.add('loaded');
        });
    }

    // Hero Image Carousel
    const heroCarousel = document.querySelector('.hero-carousel');
    if (heroCarousel) {
        const slides = heroCarousel.querySelectorAll('.hero-slide');
        if (slides.length > 1) {
            let currentIndex = 0;
            
            // Initialize: ensure first slide is visible, others are hidden
            slides.forEach((slide, index) => {
                if (index === 0) {
                    slide.classList.add('active');
                    slide.style.opacity = '1';
                } else {
                    slide.classList.remove('active');
                    slide.style.opacity = '0';
                }
                slide.style.transition = 'opacity 1s ease-in-out';
            });

            // Rotate images every 5 seconds
            setInterval(function() {
                // Remove active class and hide current slide
                slides[currentIndex].classList.remove('active');
                slides[currentIndex].style.opacity = '0';
                
                // Move to next slide
                currentIndex = (currentIndex + 1) % slides.length;
                
                // Add active class and show next slide
                slides[currentIndex].classList.add('active');
                slides[currentIndex].style.opacity = '1';
            }, 5000);
        } else if (slides.length === 1) {
            // If only one slide, make sure it's visible
            slides[0].style.opacity = '1';
            slides[0].classList.add('active');
        }
    }

    // Prayer Times Calculation
    function calculatePrayerTimes() {
        // Coordinates for Bangkinang, Riau, Indonesia
        const latitude = 0.3365;
        const longitude = 101.0251;
        
        const today = new Date();
        const date = today.getDate();
        const month = today.getMonth() + 1;
        const year = today.getFullYear();
        
        // Format date for display
        const days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        const dateDisplay = `${days[today.getDay()]}, ${date} ${months[today.getMonth()]} ${year}`;
        
        const dateElement = document.getElementById('prayer-date');
        if (dateElement) {
            dateElement.textContent = dateDisplay;
        }
        
        // Fetch prayer times from Aladhan API
        fetch(`https://api.aladhan.com/v1/timings/${date}/${month}/${year}?latitude=${latitude}&longitude=${longitude}&method=2&timezonestring=Asia/Jakarta`)
            .then(response => response.json())
            .then(data => {
                if (data.code === 200 && data.data && data.data.timings) {
                    const timings = data.data.timings;
                    
                    // Format time (remove (WIB) suffix if present)
                    const formatTime = (time) => {
                        return time.split(' ')[0].substring(0, 5);
                    };
                    
                    // Update prayer times
                    const subuhEl = document.getElementById('prayer-subuh');
                    const dzuhurEl = document.getElementById('prayer-dzuhur');
                    const asharEl = document.getElementById('prayer-ashar');
                    const maghribEl = document.getElementById('prayer-maghrib');
                    const isyaEl = document.getElementById('prayer-isya');
                    
                    if (subuhEl) subuhEl.textContent = formatTime(timings.Fajr);
                    if (dzuhurEl) dzuhurEl.textContent = formatTime(timings.Dhuhr);
                    if (asharEl) asharEl.textContent = formatTime(timings.Asr);
                    if (maghribEl) maghribEl.textContent = formatTime(timings.Maghrib);
                    if (isyaEl) isyaEl.textContent = formatTime(timings.Isha);
                }
            })
            .catch(error => {
                console.error('Error fetching prayer times:', error);
                // Fallback to approximate times if API fails
                const fallbackTimes = {
                    fajr: '04:45',
                    dhuhr: '12:15',
                    asr: '15:30',
                    maghrib: '18:20',
                    isha: '19:35'
                };
                
                const subuhEl = document.getElementById('prayer-subuh');
                const dzuhurEl = document.getElementById('prayer-dzuhur');
                const asharEl = document.getElementById('prayer-ashar');
                const maghribEl = document.getElementById('prayer-maghrib');
                const isyaEl = document.getElementById('prayer-isya');
                
                if (subuhEl) subuhEl.textContent = fallbackTimes.fajr;
                if (dzuhurEl) dzuhurEl.textContent = fallbackTimes.dhuhr;
                if (asharEl) asharEl.textContent = fallbackTimes.asr;
                if (maghribEl) maghribEl.textContent = fallbackTimes.maghrib;
                if (isyaEl) isyaEl.textContent = fallbackTimes.isha;
            });
    }
    
    // Load prayer times on page load
    const prayerDateEl = document.getElementById('prayer-date');
    if (prayerDateEl) {
        calculatePrayerTimes();
        
        // Update prayer times every hour (in case of timezone changes)
        setInterval(calculatePrayerTimes, 3600000);
    }

    // Content Modal Functionality
    const contentModal = document.getElementById('content-modal');
    const closeModalBtn = document.getElementById('close-modal');

    // Function to open modal (can be called from anywhere)
    window.openContentModal = function(element) {
        if (!contentModal) {
            console.error('Content modal not found');
            return;
        }

        const image = element.getAttribute('data-image') || element.dataset.image || '';
        const title = element.getAttribute('data-title') || element.dataset.title || '';
        const description = element.getAttribute('data-description') || element.dataset.description || '';
        const linkUrl = element.getAttribute('data-link-url') || element.dataset.linkUrl || '#';
        const linkText = element.getAttribute('data-link-text') || element.dataset.linkText || 'Tonton Video';

        // Set modal content
        const modalImage = document.getElementById('modal-image');
        const modalTitle = document.getElementById('modal-title');
        const modalDescription = document.getElementById('modal-description');
        const modalLink = document.getElementById('modal-link');
        const modalLinkText = document.getElementById('modal-link-text');

        if (modalImage) {
            modalImage.src = image;
            modalImage.alt = title;
        }
        if (modalTitle) {
            modalTitle.textContent = title;
        }
        if (modalDescription) {
            modalDescription.textContent = description;
        }
        if (modalLink) {
            modalLink.href = linkUrl;
        }
        if (modalLinkText) {
            modalLinkText.textContent = linkText;
        }

        // Show modal
        contentModal.classList.remove('hidden');
        contentModal.classList.add('flex');
        document.body.style.overflow = 'hidden'; // Prevent background scrolling
    };

    // Function to close modal
    window.closeContentModal = function() {
        if (!contentModal) return;
        contentModal.classList.add('hidden');
        contentModal.classList.remove('flex');
        document.body.style.overflow = ''; // Restore scrolling
    };

    // Initialize modal functionality when DOM is ready
    if (contentModal) {
        // Open modal when clicking on content cards
        document.addEventListener('click', function(e) {
            const trigger = e.target.closest('.content-modal-trigger');
            const btn = e.target.closest('.content-modal-trigger-btn');
            
            // If clicking on detail button
            if (btn) {
                e.preventDefault();
                e.stopPropagation();
                window.openContentModal(btn);
                return;
            }
            
            // If clicking on card (but not on button inside)
            if (trigger && !e.target.closest('.content-modal-trigger-btn')) {
                window.openContentModal(trigger);
            }
        });

        // Close modal functionality
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                window.closeContentModal();
            });
        }

        // Close modal when clicking outside the modal content
        contentModal.addEventListener('click', function(event) {
            if (event.target === contentModal) {
                window.closeContentModal();
            }
        });

        // Close modal on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape' && !contentModal.classList.contains('hidden')) {
                window.closeContentModal();
            }
        });
    }
});

