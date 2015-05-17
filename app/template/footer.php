<footer class="footer">
    <div class="container">
        <div class="footer-wrapper">
            <div class="<?php echo ($user) ? 'unlock' : 'lock'?>">
                <a href="<?php echo ($user) ? '?logout' : 'authorization'?>" class="lock-inner">Войти</a>
            </div>

            <div class="copyright">&copy; Это сайт Южакова Бориса. Пожалуйста, не используйте материалы этого сайта без
                разрешения автора.
            </div>
        </div>
    </div>
</footer>