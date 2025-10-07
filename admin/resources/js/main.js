document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const mainContent = document.getElementById('mainContent');
    const sidebarToggleBtn = document.getElementById('sidebarToggleBtn');
    const mobileSidebarToggle = document.getElementById('mobileSidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    
    let isMobile = window.innerWidth < 768;
    
    // Initialize mobile state
    if (isMobile) {
        sidebar.classList.add('mobile-closed');
    }
    
    // Desktop sidebar toggle
    sidebarToggleBtn.addEventListener('click', function() {
        if (!isMobile) {
            sidebar.classList.toggle('collapsed');
            mainContent.classList.toggle('expanded');
            
            // Change icon based on state
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('collapsed')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-chevron-right');
            } else {
                icon.classList.remove('bi-chevron-right');
                icon.classList.add('bi-list');
            }
        }
    });
    
    // Mobile sidebar toggle
    mobileSidebarToggle.addEventListener('click', function() {
        if (isMobile) {
            sidebar.classList.toggle('mobile-open');
            sidebarOverlay.classList.toggle('show');
            
            // Change icon based on state
            const icon = this.querySelector('i');
            if (sidebar.classList.contains('mobile-open')) {
                icon.classList.remove('bi-list');
                icon.classList.add('bi-x');
            } else {
                icon.classList.remove('bi-x');
                icon.classList.add('bi-list');
            }
        }
    });
    
    // Close sidebar when clicking on overlay
    sidebarOverlay.addEventListener('click', function() {
        if (isMobile) {
            sidebar.classList.remove('mobile-open');
            sidebarOverlay.classList.remove('show');
            mobileSidebarToggle.querySelector('i').classList.remove('bi-x');
            mobileSidebarToggle.querySelector('i').classList.add('bi-list');
        }
    });
    
    // Handle menu toggles for dropdown menus
    const menuToggleBtns = document.querySelectorAll('.menu-toggle-btn');
    
    menuToggleBtns.forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const menuId = this.getAttribute('data-menu');
            const menu = document.getElementById(`${menuId}-menu`);
            const toggleIcon = this.querySelector('.menu-toggle');
            
            // Close other menus
            document.querySelectorAll('.sub-menu').forEach(m => {
                if (m.id !== `${menuId}-menu`) {
                    m.classList.remove('show');
                }
            });
            
            // Reset other toggle icons
            document.querySelectorAll('.menu-toggle').forEach(icon => {
                if (icon !== toggleIcon) {
                    icon.classList.remove('rotated');
                }
            });
            
            // Toggle current menu
            menu.classList.toggle('show');
            toggleIcon.classList.toggle('rotated');
        });
    });
    
    // Responsive behavior
    function handleResize() {
        isMobile = window.innerWidth < 768;
        
        if (isMobile) {
            // Mobile behavior - ensure sidebar starts hidden
            if (!sidebar.classList.contains('mobile-open')) {
                sidebar.classList.add('mobile-closed');
            }
            mainContent.style.marginLeft = '0';
            
            // Reset desktop toggle icon
            sidebarToggleBtn.querySelector('i').classList.remove('bi-chevron-right');
            sidebarToggleBtn.querySelector('i').classList.add('bi-list');
        } else {
            // Desktop behavior
            sidebar.classList.remove('mobile-open', 'mobile-closed');
            sidebarOverlay.classList.remove('show');
            mainContent.style.marginLeft = '';
            
            // Reset mobile toggle icon
            mobileSidebarToggle.querySelector('i').classList.remove('bi-x');
            mobileSidebarToggle.querySelector('i').classList.add('bi-list');
            
            // Reset to default desktop state
            if (sidebar.classList.contains('collapsed')) {
                mainContent.classList.add('expanded');
            } else {
                mainContent.classList.remove('expanded');
            }
        }
    }
    
    // Initial call and event listener
    handleResize();
    window.addEventListener('resize', handleResize);
});