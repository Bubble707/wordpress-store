/**
 * MyPowerly Store Theme JavaScript
 * 
 * @package MyPowerly_Store
 */

(function($) {
    'use strict';

    // DOM Ready
    $(document).ready(function() {
        
        // Smooth scroll for anchor links
        $('a[href^="#"]').on('click', function(e) {
            var target = $(this.getAttribute('href'));
            if (target.length) {
                e.preventDefault();
                $('html, body').stop().animate({
                    scrollTop: target.offset().top - 100
                }, 800, 'swing');
            }
        });

        // Add animation classes on scroll
        function animateOnScroll() {
            $('.fade-in, .slide-in-left, .slide-in-right').each(function() {
                var elementTop = $(this).offset().top;
                var elementBottom = elementTop + $(this).outerHeight();
                var viewportTop = $(window).scrollTop();
                var viewportBottom = viewportTop + $(window).height();

                if (elementBottom > viewportTop && elementTop < viewportBottom) {
                    $(this).addClass('animated');
                }
            });
        }

        // Run on scroll
        $(window).on('scroll', animateOnScroll);
        animateOnScroll(); // Run on load

        // Mobile menu toggle
        $('.menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-navigation').toggleClass('active');
        });

        // Update cart count on AJAX
        $(document.body).on('added_to_cart removed_from_cart', function() {
            updateCartCount();
        });

        function updateCartCount() {
            $.ajax({
                url: mypowerlyAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'get_cart_count',
                    nonce: mypowerlyAjax.nonce
                },
                success: function(response) {
                    if (response.success) {
                        $('.cart-count').text(response.data.count);
                    }
                }
            });
        }

        // Product image hover effect (swap to second image if available)
        $('.woocommerce ul.products li.product').each(function() {
            var $product = $(this);
            var $image = $product.find('img').first();
            var originalSrc = $image.attr('src');
            var hoverSrc = $image.data('hover-src');

            if (hoverSrc) {
                $product.on('mouseenter', function() {
                    $image.attr('src', hoverSrc);
                });

                $product.on('mouseleave', function() {
                    $image.attr('src', originalSrc);
                });
            }
        });

        // Quantity input controls
        $(document).on('click', '.quantity-plus', function() {
            var $input = $(this).siblings('.qty');
            var val = parseInt($input.val()) || 0;
            var max = parseInt($input.attr('max')) || 999;
            if (val < max) {
                $input.val(val + 1).trigger('change');
            }
        });

        $(document).on('click', '.quantity-minus', function() {
            var $input = $(this).siblings('.qty');
            var val = parseInt($input.val()) || 0;
            var min = parseInt($input.attr('min')) || 0;
            if (val > min) {
                $input.val(val - 1).trigger('change');
            }
        });

        // Newsletter form submission
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();
            var $form = $(this);
            var $email = $form.find('input[type="email"]');
            var email = $email.val();

            if (email) {
                $.ajax({
                    url: mypowerlyAjax.ajaxurl,
                    type: 'POST',
                    data: {
                        action: 'newsletter_subscribe',
                        email: email,
                        nonce: mypowerlyAjax.nonce
                    },
                    beforeSend: function() {
                        $form.find('button').prop('disabled', true).text('Subscribing...');
                    },
                    success: function(response) {
                        if (response.success) {
                            alert('Thank you for subscribing!');
                            $email.val('');
                        } else {
                            alert('Something went wrong. Please try again.');
                        }
                    },
                    complete: function() {
                        $form.find('button').prop('disabled', false).text('Subscribe');
                    }
                });
            }
        });

        // Add to cart button loading state
        $(document).on('click', '.add_to_cart_button', function() {
            var $button = $(this);
            $button.addClass('loading');
        });

        $(document.body).on('added_to_cart', function() {
            $('.add_to_cart_button').removeClass('loading');
        });

        // Sticky header on scroll
        var header = $('.site-header');
        var headerHeight = header.outerHeight();
        var scrollThreshold = 100;

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > scrollThreshold) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });

        // Product quick view (if implemented)
        $(document).on('click', '.quick-view-button', function(e) {
            e.preventDefault();
            var productId = $(this).data('product-id');
            
            $.ajax({
                url: mypowerlyAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'mypowerly_quick_view',
                    product_id: productId,
                    nonce: mypowerlyAjax.nonce
                },
                success: function(response) {
                    // Display quick view modal with product data
                    // Implementation depends on modal structure
                }
            });
        });

        // Back to top button
        var $backToTop = $('<button class="back-to-top" aria-label="Back to top"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="18 15 12 9 6 15"></polyline></svg></button>');
        $('body').append($backToTop);

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                $backToTop.addClass('visible');
            } else {
                $backToTop.removeClass('visible');
            }
        });

        $backToTop.on('click', function() {
            $('html, body').animate({ scrollTop: 0 }, 600);
        });

        // Form validation enhancement
        $('input[required], textarea[required]').on('blur', function() {
            var $input = $(this);
            if (!$input.val()) {
                $input.addClass('error');
            } else {
                $input.removeClass('error');
            }
        });

        // Lazy load images (basic implementation)
        if ('IntersectionObserver' in window) {
            var imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        var img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        imageObserver.unobserve(img);
                    }
                });
            });

            document.querySelectorAll('img.lazy').forEach(function(img) {
                imageObserver.observe(img);
            });
        }

        // Product filter toggle (for mobile)
        $('.filter-toggle').on('click', function() {
            $('.woocommerce-sidebar').toggleClass('active');
        });

        // Close sidebar on overlay click
        $('.sidebar-overlay').on('click', function() {
            $('.woocommerce-sidebar').removeClass('active');
        });

        // Initialize tooltips if needed
        $('[data-tooltip]').each(function() {
            var $element = $(this);
            var tooltipText = $element.data('tooltip');
            
            $element.on('mouseenter', function() {
                var $tooltip = $('<div class="tooltip">' + tooltipText + '</div>');
                $('body').append($tooltip);
                
                var offset = $element.offset();
                $tooltip.css({
                    top: offset.top - $tooltip.outerHeight() - 10,
                    left: offset.left + ($element.outerWidth() / 2) - ($tooltip.outerWidth() / 2)
                });
            });
            
            $element.on('mouseleave', function() {
                $('.tooltip').remove();
            });
        });

    });

    // Window load
    $(window).on('load', function() {
        // Remove preloader if exists
        $('.preloader').fadeOut('slow');
    });

})(jQuery);

// Add CSS for back to top button and other dynamic elements
document.addEventListener('DOMContentLoaded', function() {
    var style = document.createElement('style');
    style.textContent = `
        .back-to-top {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 50px;
            height: 50px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow-lg);
            opacity: 0;
            visibility: hidden;
            transition: var(--transition-all);
            z-index: 999;
        }
        
        .back-to-top.visible {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background-color: var(--primary-hover);
            transform: translateY(-4px);
            box-shadow: var(--shadow-xl);
        }
        
        .cart-icon,
        .account-icon {
            position: relative;
            display: inline-flex;
            align-items: center;
            padding: 0.5rem;
            color: white;
            transition: var(--transition-fast);
        }
        
        .cart-icon:hover,
        .account-icon:hover {
            opacity: 0.8;
            text-decoration: none;
        }
        
        .cart-count {
            position: absolute;
            top: 0;
            right: 0;
            background-color: var(--error);
            color: white;
            font-size: 0.75rem;
            font-weight: bold;
            padding: 0.125rem 0.375rem;
            border-radius: 9999px;
            min-width: 1.25rem;
            text-align: center;
        }
        
        .add_to_cart_button.loading {
            opacity: 0.6;
            pointer-events: none;
        }
        
        .add_to_cart_button.loading::after {
            content: '';
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-left: 8px;
            border: 2px solid currentColor;
            border-right-color: transparent;
            border-radius: 50%;
            animation: spin 0.6s linear infinite;
        }
        
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        
        input.error,
        textarea.error {
            border-color: var(--error);
        }
        
        .tooltip {
            position: absolute;
            background-color: var(--gray-900);
            color: white;
            padding: 0.5rem 0.75rem;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            white-space: nowrap;
            z-index: 1000;
            pointer-events: none;
        }
        
        .animated {
            animation-fill-mode: both;
        }
        
        @media (max-width: 768px) {
            .back-to-top {
                bottom: 1rem;
                right: 1rem;
                width: 40px;
                height: 40px;
            }
        }
    `;
    document.head.appendChild(style);
});
