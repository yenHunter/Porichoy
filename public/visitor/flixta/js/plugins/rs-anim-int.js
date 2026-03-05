(function ($) {
    "use strict";

    $(window).on("load", function () {
        gsap_rs_split_text();
        gsap_rs_marqueeSlider();
        gsap_rs_scrollRotate();
        gsap_rs_MoveOnScroll();
        gsap_rs_custom_cursor();
        gsap_rs_image_reveal();
        gsap_fixed_elements();
    });

    // Split Text
    function gsap_rs_split_text() {
        setTimeout(function () {
            var splitTextElements = $("body:not(.rtl) .rs-split-text-enable");
            if (splitTextElements.length === 0) return;
            gsap.registerPlugin(SplitText);
            splitTextElements.each(function (index, element) {
                var splitElement = new SplitText(element, {
                    type: "chars, words", // "chars, words, lines"
                });

                gsap.set(element, { perspective: 400 });

                if ($(element).hasClass("split-in-fade")) {
                    gsap.set(splitElement.chars, { opacity: 0, ease: "Back.easeOut" });
                }
                if ($(element).hasClass("split-in-right")) {
                    gsap.set(splitElement.chars, { opacity: 0, x: "20", ease: "Back.easeOut" });
                }
                if ($(element).hasClass("split-in-left")) {
                    gsap.set(splitElement.chars, { opacity: 0, x: "-20", ease: "Back.easeOut" });
                }
                if ($(element).hasClass("split-in-up")) {
                    gsap.set(splitElement.chars, { opacity: 0, y: "20", ease: "circ.out" });
                }
                if ($(element).hasClass("split-in-down")) {
                    gsap.set(splitElement.chars, { opacity: 0, y: "-20", ease: "circ.out" });
                }
                if ($(element).hasClass("split-in-rotate")) {
                    gsap.set(splitElement.chars, { opacity: 0, rotateX: "50deg", ease: "circ.out" });
                }
                if ($(element).hasClass("split-in-scale")) {
                    gsap.set(splitElement.chars, { opacity: 0, rotateX: "50deg", ease: "circ.out" });
                }
                element.anim = gsap.to(splitElement.chars, {
                    scrollTrigger: { trigger: element, toggleActions: "restart pause resume reverse", start: "top 90%" },
                    x: "0",
                    y: "0",
                    rotateX: "0",
                    scale: 1,
                    opacity: 1,
                    duration: 0.8,
                    stagger: 0.02
                });
            });
        }, 200);
    }

    // Marquee Slider
    function gsap_rs_marqueeSlider() {
        let rs_Marquee_Slider = document.getElementsByClassName('gsap-marquee');
        if (rs_Marquee_Slider.length) {
            gsap.registerPlugin(ScrollTrigger);
            Array.from(rs_Marquee_Slider).forEach(element => {
                let directionClass = element.classList.contains('left') ? 'left' : 'right';
                let durationClass = getDurationFromClass(element.classList);
                let moveLengthClass = getMoveLengthFromClass(element.classList);
                let timeline = gsap.timeline();
                if (directionClass === 'left') {
                    timeline.to(element, {
                        x: -moveLengthClass,
                        duration: durationClass,
                        repeat: -1,
                        ease: 'linear'
                    });
                } else {
                    timeline.to(element, {
                        x: moveLengthClass,
                        duration: durationClass,
                        repeat: -1,
                        ease: 'linear'
                    });
                }
                timeline.to(element, {
                    xPercent: 6,
                    scrollTrigger: {
                        trigger: element,
                        scrub: 1
                    }
                });
            });
        }
        function getDurationFromClass(classList) {
            for (let className of classList) {
                if (className.startsWith('speed-')) {
                    return parseInt(className.substring(6));
                }
            }
            return 50;
        }
        function getMoveLengthFromClass(classList) {
            for (let className of classList) {
                if (className.startsWith('move-to-')) {
                    return parseInt(className.substring(8));
                }
            }
            return 1000;
        }
    }

    // Rotate on Scroll
    function gsap_rs_scrollRotate() {
        gsap.registerPlugin(ScrollTrigger);

        document.querySelectorAll('.gsap-rotate').forEach((element, index) => {
            let rotationSpeed = 0.2;
            let rotationClass = element.className.match(/to-(\d+)/);
            let rotationValue = rotationClass ? parseInt(rotationClass[1]) : 360; 
            gsap.to(element, {
                rotation: rotationValue * rotationSpeed,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 90%',
                    end: 'bottom',
                    scrub: 1
                }
            });
        });
        document.querySelectorAll('.gsap-rotate-anti').forEach((element, index) => {
            let rotationSpeed = 0.2;
            let rotationClass = element.className.match(/to-(\d+)/);
            let rotationValue = rotationClass ? parseInt(rotationClass[1]) : 360; 
            gsap.to(element, {
                rotation: -rotationValue * rotationSpeed,
                scrollTrigger: {
                    trigger: element,
                    start: 'top 90%',
                    end: 'bottom',
                    scrub: 1
                }
            });
        });
    }

    // Move any direction on scroll
    function gsap_rs_MoveOnScroll() {
        gsap.registerPlugin(ScrollTrigger);
        document.querySelectorAll('.gsap-move').forEach((element, index) => {
            let moveDistance = extractMoveDistanceAnadDirectionFromClass(element.className);
            let startPercentage = extractStartPercentageFromClass(element.className, 20);
            let moveProperties = {};
            switch (moveDistance.direction) {
                case 'right':
                    moveProperties = { x: moveDistance.value };
                    break;
                case 'left':
                    moveProperties = { x: -moveDistance.value };
                    break;
                case 'up':
                    moveProperties = { y: -moveDistance.value };
                    break;
                case 'down':
                    moveProperties = { y: moveDistance.value };
                    break;
                default:
                    break;
            }
            gsap.to(element, {
                x: moveProperties.x || 0,
                y: moveProperties.y || 0,
                scrollTrigger: {
                    trigger: element,
                    start: `top ${startPercentage}%`,
                    scrub: 1.7,
                }
            });
        });
        // Passing which direction and distance value eg:left-200 will pass to left 200px
        function extractMoveDistanceAnadDirectionFromClass(className) {
            const regex = /(?:^|\s)(left|right|up|down)(?:-(\d+))?(?:\s|$)/;
            const match = className.match(regex);
            const direction = match ? match[1] : 'right';
            const value = match && match[2] ? parseFloat(match[2]) : 0;
            return { direction, value };
        }
        // Passing start from value eg:start-90 will pass 90%
        function extractStartPercentageFromClass(className, defaultValue) {
            const regex = /(?:^|\s)start-(\d+)(?:\s|$)/;
            const match = className.match(regex);
            return match !== null ? parseInt(match[1]) : defaultValue;
        }
    }

    // Custom Cursor
    function gsap_rs_custom_cursor() {
        var cursorBall = document.getElementById("cursor-ball");
        if (cursorBall) {
            let mouse = { x: 0, y: 0 };
            let pos = { x: 0, y: 0 };
            let ratio = 0.99;
            let active = false;
            gsap.set(cursorBall, { xPercent: -50, yPercent: -50, borderWidth: "1px", width: "40px", height: "40px" });
            document.addEventListener("mousemove", mouseMove);
            function mouseMove(e) {
                var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                mouse.x = e.pageX;
                mouse.y = e.pageY - scrollTop;
            }
            gsap.ticker.add(updatePosition);
            function updatePosition() {
                if (!active) {
                    pos.x += (mouse.x - pos.x) * ratio;
                    pos.y += (mouse.y - pos.y) * ratio;
                    gsap.to(cursorBall, { duration: 0.08, x: pos.x, y: pos.y });
                }
            }
            
            // Common Area
            $("a, button, input[type=submit], .slick-arrow, .slick-dots li button, .player-btn-comn, .revslider-initialised rs-arrow, .search_icons i, .rs-mnt, .rs-yrs, .tp-bullet, .rsoffwrap-close, .pricing-switcher-wrapper span").on("mouseenter", function (e) {
                gsap.to(cursorBall, { borderColor: "rgba(34, 34, 34, 0.05", scale: 1.7, opacity: 0.15, backgroundColor: "rgba(34, 34, 34, 0.2)" });
            });
            $("a, button, input[type=submit], .slick-arrow, .slick-dots li button, .player-btn-comn, .revslider-initialised rs-arrow, .search_icons i, .rs-mnt, .rs-yrs, .tp-bullet, .rsoffwrap-close, .pricing-switcher-wrapper span").on("mouseleave", function (e) {
                gsap.to(cursorBall, { borderColor: "rgba(156, 156, 156, 0.5)", scale: 1, opacity: 1, backgroundColor: "transparent", width: "40px", height: "40px" });
                gsap.ticker.add(updatePosition);
            });

            // Scroll To Top
            $(".backtotop-wrap").on("mouseenter", function (e) {
                gsap.to(cursorBall, { borderColor: "rgba(34, 34, 34, 0.05)", borderRadius: "50%", width: "46px", height: "46px", opacity: 0.35, backgroundColor: "rgba(34, 34, 34, 0.3)" });
            });
            $(".backtotop-wrap").on("mouseleave", function (e) {
                gsap.to(cursorBall, { borderColor: "rgba(156, 156, 156, 0.5)", opacity: 1, borderRadius: "50%", backgroundColor: "transparent", width: "40px", height: "40px" });
                gsap.ticker.add(updatePosition);
            });
        }
    }

    // Image Revel
    function gsap_rs_image_reveal() {
        gsap.registerPlugin(ScrollTrigger);
    
        document.querySelectorAll(".rs-image.scroll_reveal").forEach((wrapper) => {
            let image = wrapper.querySelector(".rs-image.scroll_reveal img");
            let directionClass = wrapper.classList.contains('reveal_left') ? 'reveal_left' : 'reveal_right';
    
            let reveal_trigger = gsap.timeline({
                scrollTrigger: {
                    trigger: wrapper,
                    toggleActions: "restart pause resume reverse",
                }
            }).set(wrapper, { autoAlpha: 1 });
    
            // Add the class `.reveal-active`
            wrapper.classList.add("reveal-active");
    
            if (directionClass === 'reveal_left') {
                reveal_trigger.from(wrapper, 1, { xPercent: -50, ease: Power2.out })
                    .from(image, 1, { xPercent: 50, scale: 1.3, delay: -1, ease: Power2.out });
            } else {
                reveal_trigger.from(wrapper, 1, { xPercent: 50, ease: Power2.out })
                    .from(image, 1, { xPercent: -50, scale: 1.3, delay: -1, ease: Power2.out });
            }
        });
    }

    // Fixed Elements on Scroll
    function gsap_fixed_elements() {
        gsap.registerPlugin(ScrollTrigger);
    
        const containers = document.querySelectorAll(".gsap-fixed, .gsap-fixed-yes");
        containers.forEach(container => {
            const elements = container.querySelectorAll(".gsap-fixed > .e-con-inner > *, .gsap-fixed-yes > *");
            elements.forEach((element, index) => {
                const startClass = Array.from(container.classList).find(className => className.startsWith('start-'));
                const startOffset = startClass ? parseInt(startClass.split('-')[1]) : 150;
    
                ScrollTrigger.create({
                    trigger: element,
                    start: `top-=${startOffset}`,
                    end: `bottom top+=${element.offsetHeight + startOffset}`,
                    endTrigger: container,
                    pin: true,
                    pinSpacing: false,
                    id: `${container.id}-trigger-${index}`,
                    invalidateOnRefresh: true
                });
            });
        });
    }
    
})(jQuery);
