using Microsoft.EntityFrameworkCore;

namespace lab3
{
    public class ApplicationContext : DbContext
    {
        public DbSet<Client> Clients { get; set; }
        public DbSet<Orders> Orders { get; set; }
        public DbSet<Service> Services { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseMySql("server=localhost;UserId=root;Password=;database=lab02;");
        }
    }
}
