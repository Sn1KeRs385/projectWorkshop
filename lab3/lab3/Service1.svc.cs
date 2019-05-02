using System;
using System.Collections.Generic;
using System.Linq;
using System.Runtime.Serialization;
using System.ServiceModel;
using System.ServiceModel.Web;
using System.Text;

namespace lab3
{
    public class Service1 : IService1
    {
        public int AddClient(Client client)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var user = db.Clients.Add(client);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return -1;
                }
                return user.Entity.ClientId;
            }
        }

        public int AddOrders(Orders order)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var _order = db.Requests.Add(order);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return -1;
                }
                return _order.Entity.id;
            }
        }

        public int AddService(Service service)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var _service = db.Services.Add(service);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return -1;
                }
                return _service.Entity.id;
            }
        }

        public int DeleteClient(Client client)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var user = db.Clients.Remove(client);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return -1;
                }
                return 1;
            }
        }

        public int DeleteOrders(Orders order)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var _order = db.Requests.Remove(order);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return -1;
                }
                return 1;
            }
        }

        public int DeleteService(Service service)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var _service = db.Services.Remove(service);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return -1;
                }
                return 1;
            }
        }

        public Client EditClient(Client client)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var user = db.Clients.Update(client);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return null;
                }
                return user.Entity;
            }
        }

        public Orders EditOrders(Orders order)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var _order = db.Requests.Update(order);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return null;
                }
                return _order.Entity;
            }
        }

        public Service EditService(Service service)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var _service = db.Services.Update(service);
                try
                {
                    db.SaveChanges();
                }
                catch
                {
                    return null;
                }
                return _service.Entity;
            }
        }

        public Client GetClient(int id)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var user = db.Clients.Find(id);
                return user;
            }
        }

        public IEnumerable<Client> GetClients()
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var users = db.Clients.ToList();
                return users;
            }
        }

        public Orders GetOrders(int id)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var order = db.Orders.Find(id);
                return order;
            }
        }

        public IEnumerable<Orders> GetOrders()
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var order = db.Orders.ToList();
                return order;
            }
        }

        public Service GetService(int id)
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var service = db.Services.Find(id);
                return service;
            }
        }

        public IEnumerable<Service> GetServices()
        {
            using (ApplicationContext db = new ApplicationContext())
            {
                var services = db.Services.ToList();
                return services;
            }
        }
    }
}
