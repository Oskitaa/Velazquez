package dwes.spring.tarea.oscar.carballar.security;

import org.springframework.security.config.annotation.authentication.builders.AuthenticationManagerBuilder;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.EnableWebSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;
import org.springframework.security.crypto.password.NoOpPasswordEncoder;

@EnableWebSecurity
public class SecurityConfig extends WebSecurityConfigurerAdapter {


    protected void configure(AuthenticationManagerBuilder auth) throws Exception {
        auth
                .inMemoryAuthentication()
                .passwordEncoder(NoOpPasswordEncoder.getInstance())
                .withUser("gestor")
                .password("12345")
                .roles("GESTOR")
                .and()
                .withUser("user")
                .password("12345")
                .roles("USER");;

    }

    @Override
    protected void configure(HttpSecurity http) throws Exception {
        http.authorizeRequests()
                .antMatchers("/producto/new","/producto/new/submit","/producto/edit/{id}","/producto/edit/submit")
                .hasRole("GESTOR")
                .antMatchers("/webjars/**","/css/**","/","/producto","/producto/detail/{id}","/files/{filename:.+}")
                .permitAll()
                .antMatchers("/producto/{id}/comprar").authenticated()
                .anyRequest()
                .authenticated()
                .and()
                .exceptionHandling()
                .accessDeniedPage("/403")
                .and()
                .formLogin()
                .loginPage("/login")
                .permitAll();

    }
}