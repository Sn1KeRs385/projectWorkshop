using System.ComponentModel.DataAnnotations.Schema;

namespace lab3
{
    [Table("orders")]
    public class Orders
    {
        [Column("id")]
        public int id { get; set; }

        [Column("client_id")]
        public int ClientId { get; set; }

        [Column("service_id")]
        public int ServiceId { get; set; }
    }
}